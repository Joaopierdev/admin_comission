<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'seller_id'=> 'required|exists:sellers,id',
            'sale_date'=> 'required|date',
            'sale_price' => 'required|decimal:2'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute está inválido ou deve ser preenchido',
            'seller.exists' => 'É necessário que o vendedor já esteja cadastrado',
            'sale_date.date' => 'É necessário que a data seja válida',
            'sale_price.decimal' => 'Insira um valor com no máximo duas casas decimais'
        ];
    }
}
