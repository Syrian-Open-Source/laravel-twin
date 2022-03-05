<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDTOCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dto {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call(
            '
               make:dto-data'.' '

            .$this->argument('name').' '
            .$this->argument('module').' '
        );

        Artisan::call(
            '
               make:dto-caster'.' '

            .$this->argument('name').' '
            .$this->argument('module').' '
        );

        return Command::SUCCESS;
    }
}
