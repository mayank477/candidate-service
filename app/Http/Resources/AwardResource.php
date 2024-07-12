<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AwardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'externalId' => $this->external_id,
            'name' => $this->name,
            'description' => $this->description,
            'dateReceived' => $this->date_received?->format('Y-m-d H:i:s'),
            'isSaved' => $this->is_saved,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),
            'candidate' => new CandidateResource($this->whenLoaded('candidate'))
        ];
    }
}
