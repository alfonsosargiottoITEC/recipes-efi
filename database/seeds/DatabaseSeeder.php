<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // $this->call(AlimentSeeder::class);

        // factory(App\Recipe::class,2)->create()->each(function($recipe){

        //     $recipe->aliments()->save(factory(App\Aliment::class)->make());

        // });

        // factory(App\Aliment::class,2)->create();


        // DB::statement('SET_FOREIGN_KEY_CHECKS=1');

        Schema::disableForeignKeyConstraints();

        DB::table('categories')->truncate();
        DB::table('classifications')->truncate();
        DB::table('aliments')->truncate();
        DB::table('recipes')->truncate();
        DB::table('users')->truncate();

        Schema::enableForeignKeyConstraints();
        // factory(App\User::class,5)->create();


        factory(App\User::class,5)->create()->each(function($user){

            $user->recipes()->save(factory(App\Recipe::class)->make());

        });
        $this->call(ClassificationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AlimentSeeder::class);

        $aliments = App\Aliment::all();
        

        App\Recipe::all()->each(function ($recipe) use ($aliments) { 
            $recipe->aliments()->attach(
                $aliments->random(rand(1, 9))->pluck('id')->toArray()
            ); 
        });




        // $this->call(RecipeSeeder::class);
    }
}
