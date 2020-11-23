<?php

use Illuminate\Database\Seeder;
use App\Aliment;

class AlimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $aliments = [
            [
           'name' => 'Tomate',
           'classification_id' => '6',
           
       ],
       [
        'name' => 'Cebolla',
        'classification_id' => '6',
       ],
       [
        'name' => 'Lechuga',
        'classification_id' => '6',
       ],
       [
        'name' => 'Zanahoria',
        'classification_id' => '6',
       ],
       [
        'name' => 'Pechuga de pollo',
        'classification_id' => '3',
       ],
       [
        'name' => 'Pata-muslo de pollo',
        'classification_id' => '3',
       ],
       [
        'name' => 'Pulpa cuadrada',
        'classification_id' => '12',
       ],
       [
        'name' => 'Costillas de vaca',
        'classification_id' => '12',
       ],
       [
        'name' => 'Cabeza de cerdo',
        'classification_id' => '2',
       ]
       
       ];

       foreach ($aliments as $aliment) {
           Aliment::create($aliment);
       }
   }

}
