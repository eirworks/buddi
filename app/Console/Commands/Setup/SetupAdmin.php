<?php

namespace App\Console\Commands\Setup;

use App\User;
use Illuminate\Console\Command;

class SetupAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup admin';

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
        $adminName = $this->ask("Admin name");
        $adminEmail = $this->ask("Admin email");
        $adminPassword = $this->secret("Admin password");

        if (User::where('email', $adminEmail)->count() > 0)
        {
            $this->error(__("Email address already exists!"));
            return;
        }

        $admin = User::create([
            'name' => $adminName,
            'email' => $adminEmail,
            'password' => \Hash::make($adminPassword),
            'activated' => true,
        ]);

        $this->info(__("Admin account created successfully"));
    }
}
