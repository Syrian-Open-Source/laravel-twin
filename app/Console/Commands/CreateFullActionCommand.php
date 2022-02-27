<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateFullActionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {action_name} {module_name}';

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
               make:abstract-action'.' '
            .$this->argument('action_name').' '
            .$this->argument('module_name')
        );

        Artisan::call(
            '
               make:default-action'.' '
            .$this->argument('action_name').' '
            .$this->argument('module_name')
        );

        Artisan::call(
            '
               make:factory-action'.' '
            .$this->argument('action_name').' '
            .$this->argument('module_name')
        );
        return Command::SUCCESS;
    }
}
