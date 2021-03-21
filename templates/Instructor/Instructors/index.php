<?php
/**
 * @var \App\View\AppView                                                   $this
 * @var \App\Model\Entity\Instructor[]|\Cake\Collection\CollectionInterface $instructors
 */
?>
<div class="instructors index content">
    <h3><?= __('Instructors'); ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('name'); ?></th>
                    <th><?= $this->Paginator->sort('email'); ?></th>
                    <th><?= $this->Paginator->sort('password'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?= __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($instructors as $instructor): ?>
                <tr>
                    <td><?= $this->Number->format($instructor->id); ?></td>
                    <td><?= h($instructor->name); ?></td>
                    <td><?= h($instructor->email); ?></td>
                    <td><?= h($instructor->password); ?></td>
                    <td><?= h($instructor->created); ?></td>
                    <td><?= h($instructor->modified); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $instructor->id]); ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $instructor->id]); ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $instructor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instructor->id)]); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< '.__('first')); ?>
            <?= $this->Paginator->prev('< '.__('previous')); ?>
            <?= $this->Paginator->numbers(); ?>
            <?= $this->Paginator->next(__('next').' >'); ?>
            <?= $this->Paginator->last(__('last').' >>'); ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')); ?></p>
    </div>
</div>
