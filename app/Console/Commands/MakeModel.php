<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModel extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new model in {appNameSpace}\Models namespace';

    protected function getDefaultNameSpace($rootNameSpace) {
      return $rootNameSpace . '\Models';
    }
}
