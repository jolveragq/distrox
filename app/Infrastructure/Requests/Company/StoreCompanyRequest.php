<?php

namespace App\Infrastructure\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado.
     */
    public function authorize(): bool
    {
        // Aquí puedes agregar lógica de autorización si es necesario.
        return true;
    }

    /**
     * Reglas de validación para crear una empresa.
     */
    public function rules(): array
    {
        return [
            'ruc'            => ['required', 'digits:11', 'unique:companies,ruc'],
            'name'           => ['required', 'string', 'max:255'],
            'legal_name'     => ['required', 'string', 'max:255'],
            'fiscal_address' => ['required', 'string', 'max:500'],
        ];
    }
}
