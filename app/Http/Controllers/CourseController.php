<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Course\ListCoursesAction;
use App\Http\Controllers\Action\Course\ShowCourseAction;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request, ListCoursesAction $action)
    {
        $request->query->set('is-published', 1);
        return $action->handle($request);
    }

    public function show(Course $course, ShowCourseAction $action)
    {
        return $action->handle($course);
    }
}
