<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    




    public function rules()
    {
        return [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|max:255|email',
            'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address' => 'required|string|max:255',
            'building_name' => 'string|max:255|nullable',
            'opinion' => 'required|string|max:120'
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '文字列で入力してください',
            'last_name.max' => '255文字以内で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '文字列で入力してください',
            'first_name.max' => '255文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => '文字列で入力してください',
            'email.max' => '255文字以内で入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => 'ハイフンありの8文字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '文字列で入力してください',
            'address.max' => '255文字以内で入力してください',
            'building_name.string' => '文字列で入力してください',
            'building_name.max' => '255文字以内で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => '文字列で入力してください',
            'opinion.max' => '120文字以内で入力してください',
        ];
    }

    public function prepareForValidation()
    {
        // 半角→全角 カナ
        $this->merge(['postcode' => mb_convert_kana($this->postcode, 'KCSA')]);

        // 全角→半角 英数
        $this->merge(['postcode' => mb_convert_kana($this->postcode, 'as')]);
    }


    
}
