<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instructor $instructor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Instructor'), ['action' => 'edit', $instructor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Instructor'), ['action' => 'delete', $instructor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instructor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Instructors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Instructor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="instructors view content">
            <h3><?= h($instructor->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($instructor->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($instructor->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($instructor->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($instructor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($instructor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($instructor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Portfolios') ?></h4>
                <?php if (!empty($instructor->portfolios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($instructor->portfolios as $portfolios) : ?>
                        <tr>
                            <td><?= h($portfolios->id) ?></td>
                            <td><?= h($portfolios->user_id) ?></td>
                            <td><?= h($portfolios->title) ?></td>
                            <td><?= h($portfolios->content) ?></td>
                            <td><?= h($portfolios->created) ?></td>
                            <td><?= h($portfolios->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Portfolios', 'action' => 'view', $portfolios->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Portfolios', 'action' => 'edit', $portfolios->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Portfolios', 'action' => 'delete', $portfolios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portfolios->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
