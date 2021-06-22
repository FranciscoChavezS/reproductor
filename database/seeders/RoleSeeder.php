<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asignar roles y permisos
        $role1 = Role::create(['name' => 'Admin']); //creamos role para administrador
        $role2 = Role::create(['name' => 'Usuario']);//creamos role para usuario
        
        /*Con syncRole() estamos asignandole un rol a un permiso en caso de que sea uno o varios roles
        que se asiganaran*/
        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]); 

        //asignando roles para usuarios
        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        //Asignando roles para permissions
        Permission::create(['name' => 'permissions.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.destroy'])->syncRoles([$role1]);

        //Asignando rol para roles
        Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1]);

        //Asignando rol para posts
        Permission::create(['name' => 'posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'posts.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.delete'])->syncRoles([$role1, $role2]);

    }
}
