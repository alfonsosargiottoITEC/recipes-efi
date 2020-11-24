<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    public function recipe(){

        return $this->hasOne ('App\Recipe');

    }

    public function recipes(){

        return $this->hasMany ('App\Recipe');

    }



}
