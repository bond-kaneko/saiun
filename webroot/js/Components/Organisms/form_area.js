import { ContentArea } from '../Molecules/content_area.js'
import { BaseInputForm } from '../Atoms/base_input_form.js'
import { BaseSubmitButton } from '../Atoms/base_submit_button.js'

export const FormArea = {
    props: ['blocks'],
    template:`
        <div class="form-area column-40 content">
            <form method="post" accept-charset="utf-8" action="/portfolios/add">
                <fieldset>
                    <legend>ポートフォリオ作成</legend>
                    <div class="input text required error">
                        <label for="title">Title</label>
                        <base-input-form :name="title"></base-input-form>

                        <legend>コンテント</legend>
                        <content-area :blocks="blocks"></content-area>
                    </div>
                </fieldset>
                <base_submit_button text='作成'></base_submit_button>
            </form>
        </div>
    `,
    components: {
        'content-area': ContentArea,
        'base-input-form': BaseInputForm,
        'base_submit_button': BaseSubmitButton,
    }
};