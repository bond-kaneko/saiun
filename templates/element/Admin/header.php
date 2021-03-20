<nav class="top-nav">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/admin'); ?>">管理画面</a>
    </div>
    <div class="top-nav-links">
        <?= $this->Html->link('管理ユーザー', ['controller' => 'Admins', 'action' => 'index']); ?>
        <?= $this->Html->link('一般ユーザー', ['controller' => 'Users', 'action' => 'index']); ?>
    </div>
</nav>