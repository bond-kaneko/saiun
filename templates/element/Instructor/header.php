<nav class="top-nav">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/instructor'); ?>">講師画面</a>
    </div>
    <div class="top-nav-links">
        <?= $this->Html->link('マイページ', ['controller' => 'Instructors', 'action' => 'index']); ?>
        <?= $this->Html->link('ポートフォリオ', ['controller' => 'Portfolios', 'action' => 'index']); ?>
    </div>
</nav>