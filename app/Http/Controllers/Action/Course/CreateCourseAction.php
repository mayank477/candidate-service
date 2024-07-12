<?php

namespace App\Http\Controllers\Action\Course;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateCourseAction
{
    public function handle(CreateCourseRequest $request)
    {
        $course = Course::query()->create(['external_id' => uuid_create(), ...$request->validated()]);
        return successfulResponse([
            'data' => [
                'course' => new CourseResource($course)
            ]
        ], 'Course created', ResponseAlias::HTTP_CREATED);
    }
}
