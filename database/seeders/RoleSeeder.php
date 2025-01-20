<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //El sistema contará con dos roles
        //1. Admin - El Admin será el unico con la capacidad de crear mas usuarios para operar el sistema
        //2. User
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'index'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'home'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'database'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'inventario.index'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'database.importador'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'database.progreso'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'inventario'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'inventario.save'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'historial'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'usuarios'])->syncRoles([$admin]);    
        Permission::create(['name' => 'reportes'])->syncRoles([$admin,$user]);
        Permission::create(['name' => 'reportes.pdf'])->syncRoles([$admin,$user]);

    }
}
