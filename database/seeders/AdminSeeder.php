<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayAdmin = [
            [
                'name' => 'Valentino Rossi',
                'email' => 'superadmin@admin.dev',
                'level_access' => 'superadmin',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Valentino Rossa',
                'email' => 'admin@admin.dev',
                'level_access' => 'admin',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach($arrayAdmin as $value) {
            Admin::create($value);
        }
    }
}
