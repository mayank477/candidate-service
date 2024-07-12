<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'isPublished' => $this->is_published,
            'imageUrl' => $this->image_url,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),

            'chapters' => ChapterResource::collection($this->whenLoaded('chapters'))
        ];
    }
}
