<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos un registro que será el predeterminado para asignarle un rol de administrador o de artista
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('administrador')
        ])->assignRole('Admin');

        //User::factory(9)->create();
    }
}
