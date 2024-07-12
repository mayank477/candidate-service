<?php

namespace App\Http\Controllers\Action\Course;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UpdateCourseAction
{
    public function handle(Course $course, UpdateCourseRequest $request)
    {
        $course->update($request->validated());
        return successfulResponse(status: ResponseAlias::HTTP_NO_CONTENT);
    }
}
