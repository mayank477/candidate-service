<?php

namespace App\Http\Controllers\Action\Candidate\Course;

use App\Http\Resources\CandidateCourseResource;
use App\Models\Candidate;
use Illuminate\Http\Request;

class ListCandidateCourseAction
{
    public function handle(Candidate $candidate, Request $request)
    {
        $pageSize = $request->query('page-size', 50);
        $candidateCourses = $candidate->courses()->with('course.chapters')->paginate($pageSize);
        return successfulResponse([
            'data' => [
                'courses' => CandidateCourseResource::collection($candidateCourses),
                'meta' => getPaginatedData($candidateCourses, $pageSize)
            ]
        ]);
    }
}
