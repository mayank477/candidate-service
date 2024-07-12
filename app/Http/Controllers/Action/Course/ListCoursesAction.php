<?php

namespace App\Http\Controllers\Action\Course;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ListCoursesAction
{
    public function handle(Request $request)
    {
        $pageSize = $request->query('page-size', 50);
        $isPublished = null;

        if (!is_null($request->query('is-published'))) {
            $isPublished = (string)$request->query('is-published');
            info($isPublished);
            $isPublished = (bool)$isPublished;
        }

        $courses = Course::query()
            ->when($title = $request->query('title'), fn(Builder $builder) => $builder->where('title', "LIKE", "%$title%"))
            ->when(!is_null($isPublished), fn(Builder $builder) => $builder->where('is_published', '=', $isPublished))
            ->when($category = $request->query('category'), fn(Builder $builder) => $builder->where('category', '=', $category))
            ->orderBy('title')->paginate($pageSize);
        return successfulResponse([
            'data' => [
                'courses' => CourseResource::collection($courses),
                'meta' => getPaginatedData($courses, $pageSize)
            ]
        ], 'Courses retrieved.');
    }
}
