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
               'first_name' => ['required', 'string', 'max:255'],
               'last_name' => ['required', 'string', 'max:255'],
               'gender' => ['required', 'string'],
               'email' => ['required', 'string', 'email', 'max:255'],
               'password' => ['required', 'max:255'],
               'tel' => ['required', 'numeric', 'digits_between:10,11'],
               'address' => ['required', 'string', 'max:255'],
               'building' => ['required', 'string', 'max:255'],
               'type' => ['required', 'string'],
               'content' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
               'first_name.required' => '姓を入力してください',
               'first_name.string' => '姓を文字列で入力してください',
               'first_name.max' => '姓を255文字以下で入力してください',
               'last_name.required' => '名を入力してください',
               'last_name.string' => '名を文字列で入力してください',
               'last_name.max' => '名を255文字以下で入力してください',
               'gender.required' => '性別を選択してください',
               'gender.string' => '性別を文字列で入力してください',
               'email.required' => 'メールアドレスを入力してください',
               'email.string' => 'メールアドレスを文字列で入力してください',
               'email.email' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
               'email.max' => 'メールアドレスを255文字以下で入力してください',
               'password.required' => 'パスワードを入力してください',
               'password.max' => 'パスワードを255文字以下で入力してください',
               'tel.required' => '電話番号を入力してください',
               'tel.numeric' => '電話番号を数値で入力してください',
               'tel.digits_between' => '電話番号を5桁の間で入力してください',
               'address.required' => '住所を入力してください',
               'address.string' => '住所を文字列で入力してください',
               'address.max' => '住所を255文字以下で入力してください',
               'building.required' => '建物名を入力してください',
               'building.string' => '建物名を文字列で入力してください',
               'building.max' => '建物名を255文字以下で入力してください',
               'type.required' => 'お問い合わせの種類を選択してください',
               'type.string' => 'お問い合わせの種類を文字列で入力してください',
               'content.required' => 'お問い合わせ内容を入力してください',
               'content.string' => 'お問い合わせ内容を文字列で入力してください',
               'content.max' => 'お問い合わせ内容を255文字以下で入力してください',
        ];
    }
}
