<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una clase Form Request en app/Infrastructure/Requests/{Modelo}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $model = str($name)->studly();
        $requests = ["Store{$model}Request", "Update{$model}Request"];
        $folder = base_path("app/Infrastructure/Requests/$model");

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        foreach ($requests as $className) {
            $path = "$folder/$className.php";

            if (file_exists($path)) {
                $this->warn("La clase $className ya existe.");
                continue;
            }

            $stub = file_get_contents(base_path('stubs/request.stub'));

            $content = str_replace(
                ['{{ namespace }}', '{{ class }}'],
                ["App\\Infrastructure\\Requests\\$model", $className],
                $stub
            );

            file_put_contents($path, $content);
            $this->info("Request $className creado en $path");
        }
    }
}
