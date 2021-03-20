import { BaseTextareaForm } from '../Atoms/base_textarea_form.js';

export const ContentArea = {
    props: ['blocks'],
    template: `
    <div>
        <div v-for="block in blocks.blockLayout" :key="block.id">
            <base_textarea_form v-if="block.type == 'textarea'" v-bind:blockId="block.id"></base_textarea_form>
        </div>
    </div>
    `,
    components: {
        'base_textarea_form': BaseTextareaForm,
    }
};