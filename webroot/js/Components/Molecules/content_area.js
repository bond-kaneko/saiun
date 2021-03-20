export const ContentArea = {
    data: function () {
        return {
            blocks: [
                { id: 1 },
                { id: 2 },
            ],
        }
    },
    methods: {
        addTextareaBlock: function (event) {
            console.log('click');
            this.blocks.push({id: 3});
        }
    },
    template: `
    <div v-on:add-textarea-block="addTextareaBlock">
        <div v-for="block in blocks" :key="block.id">
            {{ block.id }}
        </div>
    </div>
    `,
};