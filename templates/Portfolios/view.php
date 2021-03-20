<div class="row">
    <div class="column-responsive column-80">
        <div class="portfolios view content">
            <h3><?= h($portfolio->title); ?></h3>
            <table>
                <tr>
                    <th><?= __('User'); ?></th>
                    <td><?= $portfolio->has('user') ? $this->Html->link($portfolio->user->name, ['controller' => 'Users', 'action' => 'view', $portfolio->user->id]) : ''; ?></td>
                </tr>
                <tr>
                    <th><?= __('Title'); ?></th>
                    <td><?= h($portfolio->title); ?></td>
                </tr>
            </table>
        </div>
        <div class="content">
            <?php foreach ($blocks as $type => $value): ?>
                <?php if ($type === 'textarea'): ?>
                    <?= '<p>'; ?>
                        <?= $value; ?>
                    <?= '</p>'; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
