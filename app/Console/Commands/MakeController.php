<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeController extends GeneratorCommand
{
    // Sobrescribe el nombre del comando (ya lo configuraste en --command)
    protected $name = 'make:controller';

    protected $signature = 'make:controller {name} {--api : Indica si el controlador será de tipo API}';

    // Descripción del comando
    protected $description = 'Create a new controller in app/Infrastructure/Controllers';

    // La ruta del stub original (puedes publicar stubs y copiarlos aquí si quieres customizar)
    protected function getStub()
    {
        $stub = $this->option('api')
            ? base_path('stubs/controller.api.stub')
            : base_path('stubs/controller.stub');

        return $stub;
    }

    // Namespace por defecto
    protected function rootNamespace(): string
    {
        return $this->laravel->getNamespace().'Infrastructure\Controllers';
    }

    // Ruta donde se escribirá el archivo
    protected function getPath($name): string
    {
        // Reemplaza namespace para construir ruta inversa
        $name = str_replace($this->rootNamespace().'\\', '', $name);
        return $this->laravel->basePath('app/Infrastructure/Controllers').'/'.str_replace('\\', '/', $name).'.php';
    }

    // Argumentos: conserva el argumento 'name'
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the controller'],
        ];
    }
}
