<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RequestAndPolicyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pr {request_and_policy_name} {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make policy class and request ';

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
                make:policy'.' '
            .$this->argument('request_and_policy_name').' '
            );

        Artisan::call(
            '
                module:make-request'.' '
            .$this->argument('request_and_policy_name').' '
            .$this->argument('module_name')
        );
        return Command::SUCCESS;
    }
}
