<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
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
     public function rules(){
        return [
            'email' => 'required|unique:sellers,email,'. $this->id,
            'name' => 'required|string|min:5|max:255',
            'comission' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute está inválido ou deve ser preenchido',
            'email.unique' => 'Este e-mail já foi registrado em outro vendedor'
        ];
    }
}
