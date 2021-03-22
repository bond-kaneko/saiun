<div class="row">
    <div class="column-responsive column-80">
        <div class="portfolios view content">
            <h3>ポートフォリオ詳細</h3>
            <table>
                <tr>
                    <th><?= __('Instructor'); ?></th>
                    <td><?= $portfolio->has('instructor') ? $this->Html->link($portfolio->instructor->name, ['controller' => 'Instructors', 'action' => 'view', $portfolio->instructor->id]) : ''; ?></td>
                </tr>
                <tr>
                    <th><?= __('Title'); ?></th>
                    <td><?= h($portfolio->title); ?></td>
                </tr>
                <tr>
                    <th><?= __('Id'); ?></th>
                    <td><?= $this->Number->format($portfolio->id); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created'); ?></th>
                    <td><?= h($portfolio->created); ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified'); ?></th>
                    <td><?= h($portfolio->modified); ?></td>
                </tr>
            </table>
            <label>コンテント</label>
            <table>
                <?php foreach ($portfolio->portfolio_contents as $content): ?>
                    <tr>
                        <?= h($content->content); ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
