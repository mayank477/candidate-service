<?php

namespace App\Http\Controllers\Action\Course\Chapter;

use App\Http\Resources\ChapterResource;
use App\Models\Course;
use Illuminate\Http\Request;

class ListCourseChapterAction
{
    public function handle(Request $request, Course $course)
    {
        $pageSize = $request->query('page-size', 50);
        $chapters = $course->chapters()->orderBy('position')->paginate();
        return successfulResponse([
            'data' => [
                'chapters' => ChapterResource::collection($chapters),
                'meta' => getPaginatedData($chapters, $pageSize)
            ]
        ], $course->title . ' chapters retrieved. ');
    }
}
