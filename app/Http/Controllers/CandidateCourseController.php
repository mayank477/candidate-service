<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Candidate\Course\AssignCandidateCourseAction;
use App\Http\Controllers\Action\Candidate\Course\ListCandidateCourseAction;
use App\Http\Controllers\Action\Candidate\Course\Progression\StoreProgressionAction;
use App\Http\Controllers\Action\Candidate\Course\ShowCandidateCourseAction;
use App\Http\Requests\StartCandidateCourseRequest;
use App\Http\Requests\StoreProgressRequest;
use App\Models\Candidate;
use App\Models\CandidateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CandidateCourseController extends Controller
{
    public function index(Request $request, ListCandidateCourseAction $action)
    {
        return $action->handle($request->user('sanctum'), $request);
    }

    public function store(StartCandidateCourseRequest $request, AssignCandidateCourseAction $action)
    {
        return $action->handle($request);
    }

    public function show(Candidate $candidate, CandidateCourse $candidateCourse, ShowCandidateCourseAction $action)
    {
        return $action->handle($candidate, $candidateCourse);
    }

    public function progression(StoreProgressRequest $request, CandidateCourse $candidateCourse, StoreProgressionAction $action)
    {
        return $action->handle($request, candidateCourse: $candidateCourse);
    }
}
