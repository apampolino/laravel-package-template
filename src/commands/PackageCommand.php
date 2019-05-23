<?php

namespace Vendor\Package\Commands;

use Illuminate\Console\Command;

class PackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:message {name} {--c|capitalize}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Package command description';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->argument('name')) {

            $name = $this->argument('name');

            if ($this->option('capitalize')) {

                $name = strtoupper($name);
            }

            $this->info("Hi {$name}!");

        } else {

            $this->error('Empty arguments');
        }
    }
}
