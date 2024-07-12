<?php

namespace App\Http\Controllers\Action\Candidate\Course\Progression;

use App\Http\Requests\StoreProgressRequest;
use App\Http\Resources\CandidateCourseResource;
use App\Http\Resources\ChapterResource;
use App\Models\CandidateCourse;
use App\Models\Chapter;

class StoreProgressionAction
{
    public function handle(StoreProgressRequest $request, CandidateCourse $candidateCourse)
    {
        $candidateCourse->load('candidate', 'course.chapters', 'progressions');
        if ($chapter = Chapter::query()->where('course_id', '=', $candidateCourse->course->id)->where('external_id', '=', $request->validated('chapterExternalId'))->first()) {

            $progression = $candidateCourse->progressions()->updateOrCreate([
                'chapter_id' => $chapter->id,
                'candidate_id' => $candidateCourse->candidate->id
            ], [
                'is_completed' => $request->validated('isCompleted')
            ]);

            return successfulResponse([
                'data' => [
                    'candidateCourse' => new CandidateCourseResource($candidateCourse)
                ]
            ]);
        }

    }
}
