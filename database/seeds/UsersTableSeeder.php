<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@laundryapp.local',
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'role' => 0
        ]);
    }
}
