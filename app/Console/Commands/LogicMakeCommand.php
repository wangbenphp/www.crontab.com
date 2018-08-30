<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class LogicMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:logic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new logic class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Logic';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/logic.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Logic';
    }
}