<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderFormRequest extends FormRequest
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

    public function messages()
    {
        return [
            'customer_name.required'  => 'O campo customer_name é obrigatório.',
            'products.required' => 'O campo products é obrigatório.',
            'products.check_array' => 'É necessário pelo menos 1 produto para cadastrar o pedido'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|min:3|max:50',
            'products' => 'required|check_array:1'
        ];
    }
}
