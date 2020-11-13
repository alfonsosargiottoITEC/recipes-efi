<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_name',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
