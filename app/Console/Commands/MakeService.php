<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;

class MakeService extends GeneratorCommand implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    protected $description = 'Create a new service with a backing Facade';

    protected $type = 'Service';

    protected function getStub()
    {
        return base_path('stubs/service.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        // Do string replacement
        return str_replace('{{service_name}}', $class, $stub);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->input->setArgument('name', Str::finish($this->argument('name'), 'Service'));
        $absoluteClass = '\\'.$this->qualifyClass($this->argument('name')).'::class';

        parent::handle();

        $this->call('make:facade', [
            'name' => $this->argument('name'),
            'class' => $absoluteClass,
        ]);
    }
}
