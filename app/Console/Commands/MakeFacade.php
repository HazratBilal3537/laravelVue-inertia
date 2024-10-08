<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class MakeFacade extends GeneratorCommand implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:facade {name} {class}';

    protected $description = 'Create a new facade for a service class';

    protected $type = 'Facade';

    protected function getStub()
    {
        return base_path('stubs/facade.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Facades';
    }

    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        $key = $this->argument('class');

        $stub = str_replace('{{service_class}}', $key, $stub);
        $providerPath = app_path('Providers/FacadeServiceProvider.php');
        file_put_contents($providerPath, str_replace('// insertion', $key.",\n\t\t// insertion", file_get_contents($providerPath)));

        // Do string replacement
        return str_replace('{{facade_name}}', $class, $stub);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        parent::handle();
    }
}
