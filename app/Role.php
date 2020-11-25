<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    protected $fillable = ['id','name', 'description'];


    public function user(){

        return $this->hasOne ('App\User');

    }

    public function users(){

        return $this->hasMany ('App\User');

    }





}
