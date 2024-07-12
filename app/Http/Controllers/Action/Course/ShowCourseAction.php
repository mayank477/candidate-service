<?php

namespace App\Http\Controllers\Action\Course;

use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ShowCourseAction
{
    public function handle(Course $course)
    {
        return successfulResponse([
            'data' => [
                'course' => new CourseResource($course->load('chapters'))
            ]
        ]);
    }
}
