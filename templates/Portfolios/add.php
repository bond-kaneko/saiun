<style>
.container {
    max-width: 90%;
}

#block-editor #editor {
    width: 100%;
    display: flex;
}
#block-editor #editor .form-area {
    width: 45%;
    margin-right: auto;
    margin-left: auto;
}
#block-editor #editor .block-area {
    width: 45%;
    margin-right: auto;
    margin-left: auto;
}
</style>

<div id="block-editor">
    <block-editor></block-editor>
</div>

<?= $this->Html->script('block_editor', ['type' => 'module']); ?>