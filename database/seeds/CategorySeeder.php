<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[

            [
            'name'=>"Indefinida",
            'description'=>'Por defecto'
            ],        
            [
            'name'=>"Cerdo",
            'description'=>'Carne de cerdo con alguna guarnición caliente'
            ],
            [
            'name'=>"Pollo",
            'description'=>'todo tipo de preparación con cualquier trozo de pollo, ya sea al horno,parrilla,cacerola,relleno,frio,caliente'
            ],
            [
            'name'=>"Pescados blancos"
            ,
            'description'=>'Pescados blancos de agua dulce, incluye trucha, dorado, merluza, pejerrey'
            ],
            [
            'name'=>"Vegetariano",
            'description'=>'Preparaciones para vegetarianos y veganos'
            ],
            [
            'name'=>"Frutas",
            'description'=>'Todas las preparaciones de fruta, ya sea para merienda, desayuno o postre'
            ],
            [
            'name'=>"Postres helados",
            'description'=>'Postres hechos con helado, combinado con frutas o simples, todo congelado'
            ],
            [
            'name'=>"Vaca",
            'description'=>'Carne rojas, de ternera o vaquillona, al horno, a la plancha, a la parrilla o a las llamas, acompañado de guarniciones frías o calientes'
            ]

        ];
        foreach($categories as $category){
            Category::create($category);
        };
    }
}
