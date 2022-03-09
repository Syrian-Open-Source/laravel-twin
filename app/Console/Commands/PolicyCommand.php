<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class PolicyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:policy {policy_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make new policy class that inserted in PolicyStructure Directory';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;


    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     * @return void
     * @author karam mustafa, ali monther
     * @author karam mustafa, ali monther
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }


    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     * @author karam mustafa, ali monther
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Return the stub file path
     * @return string
     * @author karam mustafa, ali monther
     *
     */
    public function getStubPath()
    {

        return __DIR__ . '/../../Stubs/PolicyStub.stub';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     * @author karam mustafa, ali monther
     *
     */
    public function getStubVariables()
    {
        return [
            'CLASS_NAME' => $this->getSingularClassName($this->argument('policy_name')),
        ];
    }


    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     * @author karam mustafa, ali monther
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     * @author karam mustafa, ali monther
     */
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;

    }

    /**
     * Get the full path of generate class
     *
     * @return string
     * @author karam mustafa, ali monther
     */
    public function getSourceFilePath()
    {
        return base_path('App\\PolicyStructure')
            .'\\'
            .$this->getSingularClassName($this->argument('policy_name')) . 'Policy.php';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     * @author karam mustafa, ali monther
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
