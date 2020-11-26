<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [

        'name',
    
    ];


    public function recipe(){

        return $this->belongsTo ('App\Recipe');

    }

    public function recipes(){

        return $this->belongToMany ('App\Recipe');

    }


}
