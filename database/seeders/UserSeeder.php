<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'System Admin', 
            'email' => 'admin@test.com',
            'password' => Hash::make('password')
        ]);
     
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'System User', 
            'email' => 'user@test.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');
    }
}
