// $(function () {
//     const blockEditor = {
//         listenBlocksClick: function () {
//             $('#text-area-block').on('click', this.appendTextArea.bind(this));
//         },
//         appendTextArea: function () {
//             const textareaBlock = $('<textarea></textarea>', {
//                 'name': `content[][textarea]`,
//             });
//             $('#content-area').append(textareaBlock);
//         }
//     };
    
//     blockEditor.listenBlocksClick();
// });


import { FormArea } from './Components/Organisms/form_area.js';
import { BlockArea } from './Components/Organisms/block_area.js';

const BlockEditor = {
    template: `
        <div id="editor">
            <form-area></form-area>
            <block-area></block-area>
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