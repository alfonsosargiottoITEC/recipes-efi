<?php

use Illuminate\Database\Seeder;
use App\Classification;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications =[

            [
            'name'=>"Sin clasificación",
            'description'=>'Por defecto'
            ],        
            [
            'name'=>"Carne porcina",
            'description'=>'Carne de cerdo'
            ],
            [
            'name'=>"Carne pollo",
            'description'=>'Carne de pollo de corral'
            ],
            [
            'name'=>"Carne pescado blanco"
            ,
            'description'=>'Pescados blancos de agua dulce'
            ],
            [
            'name'=>"Verdura de hoja verde",
            'description'=>'Todo tipo de verdura de hoja verde'
            ],
            [
            'name'=>"Verdura en general",
            'description'=>'Cualquier verdura que no sea de hoja verde'
            ],
            [
            'name'=>"Frutas",
            'description'=>'Todas las frutas'
            ],
            [
            'name'=>"Carne pescado azul",
            'description'=>'Otros pescados'
            ],

            [
            'name'=>"Aceite",
            'description'=>'Aceite procesado de girasol'
            ],
            [
            'name'=>"Harina",
            'description'=>'Toda harina refinada de trigo,maiz'
            ],
            [
            'name'=>"Azúcar",
            'description'=>'Azúcar refinado de caña de azúcar'
            ],
            [
            'name'=>"Carne vacuna",
            'description'=>'Carne roja, de ternera o vaquillona'
            ]

        ];
        foreach($classifications as $classification){
            Classification::create($classification);
        };
    }
}
