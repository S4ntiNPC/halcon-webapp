<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);

        // Crear un usuario Administrador de prueba
        User::create([
            'name' => 'Admin Halcón',
            'email' => 'admin@halcon.com',
            'password' => bcrypt('password'),
            'role_id' => 1, // 1 es Admin
            'is_active' => true
        ]);
    }
}
