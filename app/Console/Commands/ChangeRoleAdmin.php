<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ChangeRoleAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-role-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = User::where('email', 'admin@mailinator.com')->first();
        if ($user) {
            $user->update([
                'role' => User::ADMIN
            ]);
            $this->info("pembaharuan data berhasil...!");
        } else {
            $this->error("user not found...!");
        }
    }
}
