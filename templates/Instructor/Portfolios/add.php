<div class="row">
    <div class="column-responsive column-80">
        <div class="portfolios form content">
            <?= $this->Form->create($portfolio); ?>
            <fieldset>
                <legend>ポートフォリオ追加</legend>
                <?= $this->Form->control('title'); ?>

                <label>コンテンツ</label>
                <?= $this->Form->control('portfolio_contents[0][content]', ['type' => 'textarea', 'label' => false]); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
