<?php

namespace App\Infrastructure\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
     * Reglas de validación para actualizar una empresa.
     */
    public function rules(): array
    {
        $companyId = $this->route('company');

        return [
            'ruc'            => [
                'required',
                'digits:11',
                Rule::unique('companies', 'ruc')->ignore($companyId),
            ],
            'name'           => ['required', 'string', 'max:255'],
            'legal_name'     => ['required', 'string', 'max:255'],
            'fiscal_address' => ['required', 'string', 'max:500'],
        ];
    }
}
