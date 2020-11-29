<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentsRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliment_recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aliment_id');
            $table->integer('recipe_id');
            $table->integer('quantity')->default(0);
            $table->string('unit')->default('grs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aliment_recipe');
    }
}
