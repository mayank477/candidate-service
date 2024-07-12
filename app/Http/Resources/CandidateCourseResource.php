<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateCourseResource extends JsonResource
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
            'isCompleted' => $this->is_completed,
            'progress' => $this->progress,
            'createdAt' => $this->createdAtToString(),
            'updatedAt' => $this->updatedAtToString(),

            'course' => new CourseResource($this->whenLoaded('course')),
            'candidate' => new CandidateResource($this->whenLoaded('candidate'))
        ];
    }
}
