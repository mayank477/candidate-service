<?php

namespace App\Http\Controllers\Action\Course\Chapter;

use App\Http\Requests\AddCourseChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AddCourseChapterAction
{
    public function handle(AddCourseChapterRequest $request, Course $course)
    {
        $chapter = $course->chapters()->create(['external_id' => uuid_create(), ...$request->validated()]);
        return successfulResponse([
            'data' => [
                'chapter' => new ChapterResource($chapter)
            ]
        ], 'Chapter added ' . $course->title, ResponseAlias::HTTP_CREATED);
    }
}
