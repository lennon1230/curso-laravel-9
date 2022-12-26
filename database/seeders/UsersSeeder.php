<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criação de usuário Seeders 
        User::create([
            'name' => 'Lennon Gama',
            'email' => 'lennongama751@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
