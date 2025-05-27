<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
            'lastname' => 'Master',
            'second_lastname' => 'Web',
            'email' => 'niltondeveloper96@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'active',
            'photo' => 'default-profile.jpg'
        ])->assignRole('Administrador');

    }
}
