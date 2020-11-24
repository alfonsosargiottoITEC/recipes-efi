<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'category_id'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }


    public function aliments(){

        return $this->belongsToMany('App\Aliment')->withPivot('created_at');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

}
