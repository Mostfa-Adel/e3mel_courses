<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'views_count'=>$this->views_count,
            'levels'=>$this->level,
            'hours'=>$this->hours,
            'active'=>$this->active,
            'category'=>CategoryResource::make($this->category) ,
        ];
        return parent::toArray($request);
    }
}
