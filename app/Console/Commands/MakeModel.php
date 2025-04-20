<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeModel extends GeneratorCommand
{
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model in app/Domain/Models';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/model.stub');
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace(): string
    {
        return $this->laravel->getNamespace() . 'Domain\Models';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name): string
    {
        // Elimina el namespace base para construir la ruta relativa
        $relative = str_replace($this->rootNamespace() . '\\', '', $name);

        // Convierte barras de namespace en separadores de carpeta
        return $this->laravel->basePath('app/Domain/Models')
             . '/' . str_replace('\\', '/', $relative) . '.php';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model'],
        ];
    }
}
