<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'guild' => $this->guild->name,
            'guild_id' => $this->guild_id,
            'active' => $this->is_active
        ];
    }
}
