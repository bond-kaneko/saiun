<div class="row">
    <div class="column-responsive column-80">
        <div class="portfolios form content">
            <?= $this->Form->create($portfolio, ['type' => 'file']); ?>
            <fieldset>
                <legend>ポートフォリオ追加</legend>
                <?= $this->Form->control('title'); ?>

                <label>コンテンツ</label>
                <div>
                    <?= $this->Form->control('portfolio_contents[0][content]', ['type' => 'textarea', 'label' => false]); ?>
                    <?= $this->Form->control('portfolio_contents[0][image]', ['type' => 'file', 'label' => false]); ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
