<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    //



    public function aliment(){

        return $this->hasOne ('App\Aliment');

    }


    public function aliments(){

        return $this->hasMany ('App\Aliment');

    }
}
