<?php

namespace App\Http\Resources\News;

use App\Http\Resources\Category\CategoryGetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsGetResource extends JsonResource
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
            'title' => $this->title,
            'text' => $this->title,
            'category' => new CategoryGetResource($this->category),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
