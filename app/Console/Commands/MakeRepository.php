<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class and interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $name = $this->argument('name');

        // Define the paths for the repository and interface
        $repositoryPath = app_path("Repositories/{$name}Repository.php");
        $interfacePath = app_path("Repositories/Contracts/{$name}RepositoryInterface.php");

        // Check if the repository already exists
        if (File::exists($repositoryPath)) {
            $this->error('Repository already exists!');
            return;
        }

        // Create the repository directory if it doesn't exist
        if (!File::isDirectory(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'));
        }

        // Create the contracts directory if it doesn't exist
        if (!File::isDirectory(app_path('Repositories/Contracts'))) {
            File::makeDirectory(app_path('Repositories/Contracts'));
        }

        // Create the repository class
        File::put($repositoryPath, $this->getRepositoryStub($name));

        // Create the interface
        File::put($interfacePath, $this->getInterfaceStub($name));

        $this->info('Repository and interface created successfully!');
    }

    // Stub for the repository class
    protected function getRepositoryStub($name)
    {
        return <<<EOD
        <?php

        namespace App\Repositories;

        use App\Repositories\Contracts\\{$name}RepositoryInterface;

        class {$name}Repository extends BaseRepository implements {$name}RepositoryInterface
        {
            // Add your repository methods here
        }
        EOD;
    }

    // Stub for the repository interface
    protected function getInterfaceStub($name)
    {
        return <<<EOD
        <?php

        namespace App\Repositories\Contracts;

        interface {$name}RepositoryInterface extends BaseRepositoryInterface {}
        EOD;
    }
}
