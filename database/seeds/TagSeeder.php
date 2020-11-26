<?php

use Illuminate\Database\Seeder;
use App\Tag;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
           'name' => 'Vegano',                      
       ],
       [
        'name' => 'Verano',
       ],
       [
        'name' => 'Amigos',
       ],
       [
        'name' => 'Parrilla',
       ],
       [
        'name' => 'Apto Celíacos',
       ],
       [
        'name' => 'Tradicional',
       ],
       [
        'name' => 'Criollo',
       ],
       [
        'name' => 'Mexicana',
       ],
       [
        'name' => 'Japonesa',
       ]
       
       ];


       foreach ($tags as $tag) {
        Tag::create($tag);
    }
    }
}
