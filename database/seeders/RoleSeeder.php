<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $RoleAdmin = Role::create(['name' => 'Admin']);
        $RoleWriter = Role::create(['name' => 'Writer']);
        $RoleUser = Role::create(['name' => 'User']);


        
        Permission::create(['name' => 'admin.home','description'=>'Ver Dashboard'])->syncRoles([$RoleAdmin,$RoleWriter,$RoleUser]);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Lista de roles'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Registrar rol'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar rol'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar rol'])->syncRoles($RoleAdmin);



        
        /* permisos Role 1 para usuarios */
        Permission::create(['name' => 'admin.usuarios.index', 'description' => 'Lista de usuarios'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.usuarios.edit', 'description' => 'Editar usuario'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.usuarios.update', 'description' => 'Actualizar usuario y asignar roles'])->syncRoles($RoleAdmin);


        Permission::create(['name' => 'admin.invitados.index', 'description' => 'Lista de invitados'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.invitados.create', 'description' => 'Registrar invitado'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.invitados.edit', 'description' => 'Editar invitado'])->syncRoles($RoleAdmin);
        Permission::create(['name' => 'admin.invitados.destroy', 'description' => 'Eliminar invitado'])->syncRoles($RoleAdmin);



       



       


    }
}
