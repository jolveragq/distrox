<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MakeUseCase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:use-case {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera una clase Use Case en Application/UseCases/{Domain}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = $this->argument('name');
        $actions = ['Create', 'Delete', 'Get', 'List', 'Update'];
        $namespace = "App\\Application\\UseCases\\$domain";

        foreach ($actions as $action) {
            $className = "{$action}{$domain}UseCase";
            $path = app_path("Application/UseCases/$domain/{$className}.php");

            if (File::exists($path)) {
                $this->warn("El archivo $className ya existe.");
                continue;
            }

            File::ensureDirectoryExists(dirname($path));

            $content = <<<PHP
            <?php

            namespace $namespace;

            use App\\Domain\\Repositories\\{$domain}RepositoryInterface;

            class $className
            {
                public function __construct(private {$domain}RepositoryInterface \$repo) {}

                public function execute(array \$data)
                {
                    // TODO: Implement $action logic
                }
            }

            PHP;

            File::put($path, $content);
            $this->info("UseCase $className creado exitosamente en $path");
        }

        $repoInterface = "{$domain}RepositoryInterface";
        $repoNamespace = "App\\Domain\\Repositories";
        $repoPath = app_path("Domain/Repositories/{$repoInterface}.php");

        if (!File::exists($repoPath)) {
            File::ensureDirectoryExists(dirname($repoPath));

            $repoContent = <<<PHP
            <?php

            namespace $repoNamespace;

            use App\\Domain\\Models\\$domain;

            interface $repoInterface
            {
                public function all(): array;

                public function create(array \$data): $domain;

                public function findById(int \$id): $domain;

                public function update(int \$id, array \$data): $domain;

                public function delete(int \$id): void;
            }

            PHP;

            File::put($repoPath, $repoContent);
            $this->info("Repository interface $repoInterface creado exitosamente en $repoPath");
        }else{
            $this->info("Repository interface $repoInterface ya existe");
        }
    }
}
