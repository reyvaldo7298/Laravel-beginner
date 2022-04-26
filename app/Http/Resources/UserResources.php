<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'email_verified_at' => $this->emai_verif,
            'password' => $this->password,
            'remember_token' => $this->rem_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->update_at,
        ];
        // return parent::toArray($request);
    }
}
