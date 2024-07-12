<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
            'jobTitle' => $this->job_title,
            'name' => $this->name,
            'email' => $this->email,
            'bearerToken' => $this->when($this->bearerToken, fn() => $this->bearerToken),
            'phoneNumber' => $this->phone_number,
            'yearsOfExperience' => $this->years_of_experience,
            'address' => $this->address,
            'nationality' => $this->nationality,
            'dob' => $this->dob,
            'linkedInUrl' => $this->linked_in_url,
            'githubUrl' => $this->github_url,
            'placeOfBirth' => $this->place_of_birth,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),

            'awards' => AwardResource::collection($this->whenLoaded('awards')),
            'attachments' => FileResource::collection($this->whenLoaded('attachments'))
        ];
    }
}
