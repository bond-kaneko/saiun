import { FormArea } from './Components/Organisms/form_area.js';
import { BlockArea } from './Components/Organisms/block_area.js';

const BlockEditor = {
    data: function () {
        return {
            blocks: {
                blockLayout: [
                    {
                        index: 0,
                        id: 1,
                        type: "textarea"
                    }
                ],
                blockData: [
                    {
                        id: 1,
                        value: "hogehoge",
                    },
                ],
            }
        }
    },
    methods: {
        AddTextareaBlock: function () {
            this.blocks.blockLayout.push({
                index: 1,
                id: 2,
                type: 'textarea',
            });
            this.blocks.blockData.push({
                id: 2,
                value: 'fugafuga',
            });
        }
    },
    template: `
        <div id="editor">
            <form-area :blocks="blocks"></form-area>
            <block-area v-on:add-textarea-block="AddTextareaBlock"></block-area>
        </div>
    `,
    components: {
        'form-area': FormArea,
        'block-area': BlockArea,
    }
};


new Vue({
    el: '#block-editor',
    components: {
        'block-editor': BlockEditor,
    }
})