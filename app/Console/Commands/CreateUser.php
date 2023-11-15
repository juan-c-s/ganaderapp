<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create';
    protected $description = 'Create a new user';

    public function handle()
    {
        $name = $this->ask('Enter user name');
        $email = $this->ask('Enter user email');
        $address = $this->ask('Enter user address');
        $wallet = $this->ask('Enter user wallet');
        $role = $this->ask('Enter user role');
        $password = $this->secret('Enter user password');

        $user = new User([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'wallet' => $wallet,
            'role' => $role,
            'password' => Hash::make($password),
        ]);

        $user->save();

        $this->info('User created successfully!');
    }
}
