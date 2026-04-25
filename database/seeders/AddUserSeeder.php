<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = $this->command->ask('What is your name?');
        $email = $this->command->ask('What is your email?');
        $password = $this->command->ask('What is your password?');
        $hashedPassword = Hash::make($password);

        if(User::where('email',$email)->exists()){
            $this->command->error("Email already exists");
            return;
        }
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,

        ]);
    }
}
