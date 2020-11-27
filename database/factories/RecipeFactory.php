<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {



    $photos = ['https://gastronomiaycia.republica.com/wp-content/uploads/2013/09/pollo_parrilla1.jpg',
    'https://www.goya.com/media/4186/grilled-chicken-salad.jpg?quality=80',
    'https://www.divinacocina.es/wp-content/uploads/ensalada-cesar-rapida-facil.jpg',
    'https://telesoldiario.com/wp-content/uploads/2019/12/Chivo.jpg',
    'https://truffle-assets.imgix.net/ffa21afe-tefiencasa_th_landscape_20171127_matambritoalapizza.jpg',
    'https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2015/03/pizza-de-tomatitos-cherry-con-rucula.jpg',
    'https://www.hogarmania.com/archivos/201901/ensalada-aguacate-xl-1280x720x80xX-1.jpg',
    'https://cocinatis.com/media/photologue/photos/cache/CTIS0444-receta-tofu-frito_large_16x9.JPG',
    'https://www.hazteveg.com/img/recipes/full/202003/R12-56535.jpg',
    'https://dam.cocinafacil.com.mx/wp-content/uploads/2015/07/Canelones-de-espinacas-con-Ricotta.jpg',
    'https://www.recetasdesbieta.com/wp-content/uploads/2018/10/lasagna-original..jpg',
    'https://cuk-it.com/wp-content/uploads/2020/05/thumb02-1-1024x576-2.jpg',
    'https://okdiario.com/img/2019/08/27/receta-de-locro-argentino-1.jpg'
    ];

    $names = [
        'Pollo a la parrilla',
        'Ensalada Caesar',
        'Tofu con miel y soja',
        'Seitán',
        'Lasagnas',
        'Canelones de espinaca a la Romana',
        'Locro argentino',
        'Matambre a la pizza con orégano',
        'Ensalada de tomatitos cherry',

        

    ];
    
    


    return [
        'name' => $faker->randomElement($names),
        'description' => $faker->paragraph(5),
        'user_id' => $faker-> numberBetween(1,5),
        'rating' => 0,
        'photo' =>$faker->randomElement($photos),
        'category_id' => $faker->numberBetween(1,8),
        'view_count'=>$faker->numberBetween(30,500),
    ];
});
