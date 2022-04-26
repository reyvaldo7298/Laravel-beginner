<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // 'image' => $this->image,
            'name' => $this->name,
            'position_id' => $this->position_id,
            'address' => $this->address,
            'image_id' => $this->image_id,
            'hobbies' => HobbyResource::collection($this->whenLoaded('hobbies')), 
        ];
        // return parent::toArray($request);
    }
}
