import { AddTextareaBlockButton } from '../Atoms/add_textarea_block_button.js'

export const BlockArea = {
    template: `
        <div class="block-area column-40 content">
            <lagend>ブロック</lagend>
            <ul id="blocks">
                <add-textarea-block-button v-on:add-textarea-block="$emit('add-textarea-block')"></add-textarea-block-button>
            </ul>
        </div>
    `,
    components: {
        'add-textarea-block-button': AddTextareaBlockButton,
    }
}