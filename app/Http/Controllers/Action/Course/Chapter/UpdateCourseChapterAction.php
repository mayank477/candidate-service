<?php

namespace App\Http\Controllers\Action\Course\Chapter;

use App\Http\Requests\AddCourseChapterRequest;
use App\Http\Requests\UpdateCourseChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UpdateCourseChapterAction
{
    public function handle(UpdateCourseChapterRequest $request, Course $course, Chapter $chapter)
    {
        $chapter->update($request->validated());
        return successfulResponse(status: ResponseAlias::HTTP_NO_CONTENT);
    }
}
