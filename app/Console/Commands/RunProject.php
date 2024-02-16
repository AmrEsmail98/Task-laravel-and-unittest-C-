<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunProject extends Command {
    protected $signature   = 'run:project';
    protected $description = 'Reset the database, run migrations, seed the database, and start the Laravel server';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {

     //migrate and seeder
        $this->info('Resetting the database and seeder');
        $this->call('migrate:fresh', ['--seed' => true]);
     // run server
        $this->info('Starting Laravel server');
        $this->call('serve');
    }
}
