<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class NewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

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
        User::create([
            'name' => $this->ask('Name?'),
            'login' => $this->ask('Login?'),
            'email' => $this->ask('Email?'),
            'password' => bcrypt($this->secret('Password?')),
        ]);
        $this->info('Account created ');
    }
}
