<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'max:20',
            ],

            'company' => [
                'nullable',
                'max:255',
            ],

        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [

            'name.required' => '顧客名は必須です。',

            'name.max' => '顧客名は100文字以内です。',

            'email.required' => 'メールアドレスは必須です。',

            'email.email' => 'メールアドレスの形式が正しくありません。',

            'email.max' => 'メールアドレスは255文字以内です。',

        ];
    }
}
