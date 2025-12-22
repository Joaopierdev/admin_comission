<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'email' => 'required|unique:admin_users,email,'. $this->id,
            'name' => 'required|string|min:5|max:255',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute está inválido ou deve ser preenchido',
            'email.unique' => 'Este e-mail já foi registrado em outro vendedor',
            'password.required' => 'É necessário inserir uma senha'
        ];
    }
}
