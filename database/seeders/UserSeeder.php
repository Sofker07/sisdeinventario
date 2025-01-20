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
     */
    public function run(): void
    {
        $user = User::create([
            
            'name' => 'Administrador',
            'email' => 'administror@jl-ver.ine.mx',
            'password' => Hash::make('1nv3nt4ar10'),
        ]);
        
        $user->assignRole('admin');
    }
}
