<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Recipe;

class Favorite extends Model
{


    protected $guarded = [];

    // protected $fillable = [
    //     'user_id', 'recipe_id','created_at','updated_at'
    // ];

    public function recipes(){
        
        return $this->belongsToMany('App\Recipe');
    }
}
