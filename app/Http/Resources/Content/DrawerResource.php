<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class DrawerResource extends JsonResource
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
            'id' => encrypt($this->id),
            'name' => $this->name,
            'date' => Carbon::parse($this->created_at)->format('MMMM D, YYYY h:mm A'),
        ];
    }
}
