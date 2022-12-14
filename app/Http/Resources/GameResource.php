<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'first_team_id' => $this->first_team_id,
            'second_team_id' => $this->second_team_id,
            'first_score' => $this->first_score,
            'second_score' => $this->second_score,
            'listing_id' => $this->listing_id
        ];;
    }
}
