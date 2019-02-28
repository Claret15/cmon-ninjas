<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberEvents extends JsonResource
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
            'name' => $this->member->name,
            'event' => $this->event->name,
            'event_date' => $this->event->event_date->format('d-M-Y'),
            'position' => $this->position,
            'guild_pts' => $this->guild_pts,
            'solo_pts' => $this->solo_pts,
            'league'=> $this->league->name,
            'solo_rank' => $this->solo_rank,
            'global_rank' => $this->global_rank,
        ];
    }
}
