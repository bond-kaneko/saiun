export const BaseTextareaForm = {
    props: ['blockId'],
    computed: {
        blockIdAttr: function () {
            return 'block-' + this.blockId;
        }
    },
    template: `
        <textarea :id="blockIdAttr"></textarea>
    `
}