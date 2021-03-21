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
    <block-editor csrf-token="<?= $this->request->getAttribute('csrfToken'); ?>"></block-editor>
</div>

<!-- <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken'); ?>"> -->

<?= $this->Html->script('block_editor', ['type' => 'module']); ?>