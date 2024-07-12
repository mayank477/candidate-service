<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Course\Chapter\AddCourseChapterAction;
use App\Http\Controllers\Action\Course\Chapter\ListCourseChapterAction;
use App\Http\Controllers\Action\Course\Chapter\UpdateCourseChapterAction;
use App\Http\Requests\AddCourseChapterRequest;
use App\Http\Requests\UpdateCourseChapterRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseChapterController extends Controller
{
    public function index(Request $request, Course $course, ListCourseChapterAction $action)
    {
        return $action->handle($request, $course);
    }

    public function store(AddCourseChapterRequest $request, Course $course, AddCourseChapterAction $action)
    {
        return $action->handle($request, $course);
    }

    public function update(UpdateCourseChapterRequest $request, Course $course, Chapter $chapter, UpdateCourseChapterAction $action)
    {
        return $action->handle($request, $course, $chapter);
    }
}
