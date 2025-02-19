<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Se necessário, você pode adicionar uma lógica para permitir ou não essa request.
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
            'campo' => 'required|min:3', // Regra personalizada: obrigatório e com mínimo de 3 caracteres
        ];
    }

    /**
     * Customizando as mensagens de erro (opcional)
     *
     * @return array
     */
    public function messages()
    {
        return [
            'campo.required' => 'O campo é obrigatório!',
            'campo.min' => 'O campo deve ter pelo menos 3 caracteres!',
        ];
    }
}