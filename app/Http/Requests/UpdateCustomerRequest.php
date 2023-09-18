<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Puedes cambiar esto según tus necesidades de autorización
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
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255', // Puedes permitir el mismo correo en la actualización si lo deseas
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            // Agrega otras reglas de validación según tus necesidades
        ];
    }
}

