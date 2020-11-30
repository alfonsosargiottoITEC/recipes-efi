<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{

    

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'category_id',
        'photo',
        'view_count',
        'favorite_id',
        'favorites'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }


    public function aliments(){

        return $this->belongsToMany('App\Aliment')->withPivot('created_at','quantity','unit');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags(){

        return $this->belongsToMany('App\Tag');
    }

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }

    
    public function favorited()
    {
    return (bool) Favorite::where('user_id', Auth::id())
                        ->where('recipe_id', $this->id)
                        ->first();
    }

}
