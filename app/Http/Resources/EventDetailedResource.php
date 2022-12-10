<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventDetailedResource extends JsonResource
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
            'title' => $this->title,
            'startDate' => $this->start_date,
            'description' => $this->description,
            'endDate' => $this->end_date,
            'imagePath' => $this->image_path,
            'publishDate' => $this->publish_date,
            'eventDate' => $this->event_date,
            'eventTime' => $this->event_time,
            'location' => $this->location,
            'creator' => new UserResource($this->creator),
            'tickets' => TicketResource::collection($this->tickets),
        ];
    }
}
