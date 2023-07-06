<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpendingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|unique:spendings',
            'date' => 'required',
            'price' => 'required',
        ];
    }
    public function messages()
    {
        return  [
            'category.required' => 'Vui lòng điền đầy đủ thông tin!',
            'date.required' => 'Vui lòng điền đầy đủ thông tin!',
            'price.required' => 'Vui lòng điền đầy đủ thông tin!',
        ];
    }
}
