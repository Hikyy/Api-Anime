<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $Resource = [
            'id' => $this->id,
            'title' => $this->title,
            'Synopsis' => $this->Synopsis,
            'Score' => $this->Score,
            'Image' => $this->Image
        ];

        return $Resource;
        //return parent::toArray($request);
    }
}
