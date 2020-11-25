<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[

            [
            'name'=>"Administrador",
            'id'=>1,
            'description'=>'puede todo'
            ],        
            [
            'name'=>"Cocinero",
            'id'=>2,
            'description'=>'puede crear,editar,ver y borrar sus Recetas. Puede ver y puntuar las recetas de los demas'
            ]
        ];
        foreach($roles as $role){
            Role::create($role);
        };
    }
}
