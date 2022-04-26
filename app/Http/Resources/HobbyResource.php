<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HobbyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $employee = $this->whenLoaded('employee');
        return [
            'id' => $this->id,
            'employee' => new EmployeeResource($employee)
        ];
        // return parent::toArray($request);
    }
}
