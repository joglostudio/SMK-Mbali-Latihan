<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $arrayUser = [
            'nik' => '123456',
            'nama' => 'Muri budiman',
            'email' => 'udamuri@gmail.com',
            'password' => Hash::make('123456'),
        ];

        User::create($arrayUser);
    }
}
