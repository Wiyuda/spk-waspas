<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ThreeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin2',
            'password' => Hash::make('admin123')
        ]);

        $user = User::create([
            'username' => 'admin3',
            'password' => Hash::make('admin123')
        ]);

        $user = User::create([
            'username' => 'admin4',
            'password' => Hash::make('admin123')
        ]);
    }
}
