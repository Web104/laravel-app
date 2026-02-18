<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Autoriser la requête pour le moment
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * GRécupérer la règle de validation à appliquer à la requête
    */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'], // Min 3 caractères
            'email' => ['required', 'email', 'unique:users, email'], // Email valide
            'password' => ['required', 'string', 'min:8'], // Min 8 caractères
            'status' => ['requiered', Rule::in(['inactive', 'active', 'suspended', 'deleted'])], // Enum imposé
            'role' => ['requiered', Rule::in(['admin', 'user'])], // Enum imposé
        ];
    }
}
