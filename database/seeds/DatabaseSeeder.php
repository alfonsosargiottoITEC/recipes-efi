<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('classifications')->truncate();
        DB::table('aliments')->truncate();
        DB::table('recipes')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::table('recipe_tag')->truncate();

        Schema::enableForeignKeyConstraints();
        // factory(App\User::class,5)->create();
        $this->call(ClassificationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AlimentSeeder::class);
        $this->call(RecipeSeeder::class);

        
        factory(App\User::class,5)->create()->each(function($user){
            
            $user->recipes()->save(factory(App\Recipe::class)->make());
            
        });


        $aliments = App\Aliment::all();
        $tags = App\Tag::all();
        $units = [['id'=>'1','name'=>'mm'],['id'=>'2','name'=>'grs']];
    
        // App\Recipe::all()->each(function ($recipe) use ($aliments) { 
        //     $rand_aliment = $aliments->random(rand(1, 9))->pluck('id')->toArray();
        //     $unit = $faker->randomElement($units);
        //     $quantity = $faker-> numberBetween(100,200);
        //     $alimentos = collect([$rand_aliment,$unit,$quantity]);
        //     $recipe->aliments()->attach(
        //         $alimentos
        //     ); 
        // });
    
        App\Recipe::all()->each(function ($recipe) use ($aliments) { 
                $recipe->aliments()->attach(
                    $aliments->random(rand(1, 9))->pluck('id')->toArray()
                ); 
            });
        
        
        App\Recipe::all()->each(function ($recipe) use ($tags) { 
            $recipe->tags()->attach(
                $tags->random(rand(1, 9))->pluck('id')->toArray()
            ); 
        });
        
    }
}
