<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Aliment;
use App\Tag;
use App\Category;
use App\Http\Resources\Category as CategoryResource;

class Recipe extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description'=>$this->description,
            'created_at'=>$this->created_at,
            'category'=>$this->category->name,
            'aliments'=>$this->aliments,

        ];
    
    }
}
