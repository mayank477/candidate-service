<?php

namespace App\Http\Controllers\Action\Candidate\Course;

use App\Http\Resources\CandidateCourseResource;
use App\Models\Candidate;
use App\Models\CandidateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class ShowCandidateCourseAction
{
    public function handle(Candidate $candidate, CandidateCourse $candidateCourse)
    {
        return successfulResponse([
            'data' => [
                'progression' => new CandidateCourseResource($candidateCourse->load('course.chapters'))
            ]
        ]);
    }
}
