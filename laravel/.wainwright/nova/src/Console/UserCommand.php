<?php

namespace Laravel\Nova\Console;

use Illuminate\Console\Command;
use Laravel\Nova\Nova;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        Nova::createUser($this);

        $this->info('Admin been created successfully.');
    }
}
