<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeworkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'homework'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required | string | max:200',
            'gender' => 'required | integer ',
            'age_id' => 'required | integer | between 1, 6',
            'mail' => 'required | email | max:255',
            'send_email' => 'requires | integer | between 0, 1',
            'feedback' => 'string',
        ];
    }

    public function messages(){
        return [
            'required' => 'この項目は必須です',
            'mail.email' => 'メールアドレスを記入して下さい',
        ];
    }
}
