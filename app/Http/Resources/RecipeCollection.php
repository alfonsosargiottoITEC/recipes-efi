<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Recipe;
use App\Aliment;
use App\Http\Resources\Aliment as AlimentResource;
use App\Http\Resources\Category as CategoryResource;

class RecipeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $aliments = Aliment::all();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id'=>$this->category_id,
            'description' => $this->description,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'aliment_id' => $this->$aliments,
            'aliments' => AlimentResource::collection($this->whenLoaded('aliments')),
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        
    }
}
