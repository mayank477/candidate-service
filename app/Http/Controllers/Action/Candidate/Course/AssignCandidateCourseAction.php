<?php

namespace App\Http\Controllers\Action\Candidate\Course;

use App\Http\Requests\StartCandidateCourseRequest;
use App\Http\Resources\CandidateCourseResource;
use App\Models\Candidate;
use App\Models\CandidateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignCandidateCourseAction
{
    public function handle(StartCandidateCourseRequest $request)
    {
        $course = Course::query()->where('external_id', '=', $request->validated('courseExternalId'))->first();
        $candidate = $request->user('sanctum');
        $candidateCourse = new CandidateCourse(['external_id' => uuid_create()]);
        $candidateCourse->course()->associate($course);
        $candidateCourse->candidate()->associate($candidate);
        $candidateCourse->save();
        return new CandidateCourseResource($candidateCourse->load('course.chapters'));
    }
}
