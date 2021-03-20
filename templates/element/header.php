<nav class="top-nav">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/'); ?>">才雲</a>
    </div>
    <div class="top-nav-links">
        <?= $this->Html->link('マイページ', ['controller' => 'Users', 'action' => 'index']); ?>
    </div>
</nav>