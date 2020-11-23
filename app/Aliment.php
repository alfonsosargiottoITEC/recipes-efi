<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
    //


protected $fillable = [

    'name',
    'classification_id'

];


public function classification(){

    return $this->belongsTo ('App\Classification');

}

public function recipes(){
        
    return $this->belongsToMany('App\Recipe');
}




};
