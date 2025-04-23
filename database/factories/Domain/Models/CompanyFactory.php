<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * El modelo al que corresponde esta factoría.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define el estado por defecto del modelo Company.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            // RUC de 11 dígitos único
            'ruc'            => $this->faker->unique()->numerify('###########'),
            // Nombre comercial de la empresa
            'name'           => $this->faker->company(),
            // Razón social
            'legal_name'     => $this->faker->company(),
            // Dirección fiscal
            'fiscal_address' => $this->faker->address(),
        ];
    }
}
