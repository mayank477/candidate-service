<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
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
            'isFree' => $this->is_free,
            'isPublished' => $this->is_published,
            'position' => $this->position,
            'isAccess' => $this->is_access,
            'imageUrl' => $this->image_url,
            'videoUrl' => $this->video_url,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),

            'course' => new CourseResource($this->whenLoaded('course')),
            'quizzes' => QuizResource::collection($this->whenLoaded('quizzes'))
        ];
    }
}
