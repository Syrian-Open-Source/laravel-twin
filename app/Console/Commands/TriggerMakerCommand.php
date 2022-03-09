<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TriggerMakerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trigger {trigger_name} {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make laravel migration in triggers table ';

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
     * @author karam mustafa, ali monther
     */
    public function handle()
    {
        Artisan::call(
            '
                module:make-migration '

            .$this->argument('trigger_name').' '

            .$this->argument('module_name')
        );
        return Command::SUCCESS;
    }
}
