<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Course\CreateCourseAction;
use App\Http\Controllers\Action\Course\ListCoursesAction;
use App\Http\Controllers\Action\Course\ShowCourseAction;
use App\Http\Controllers\Action\Course\UpdateCourseAction;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AdminCourseController
 *
 * This class handles the admin functionality related to courses.
 * It extends the base Controller class.
 */
class AdminCourseController extends Controller
{
    /**
     * Index method.
     *
     * @param Request $request The request object.
     * @param ListCoursesAction $action The action object.
     * @return JsonResponse The result of calling the handle method on the action object.
     */
    public function index(Request $request, ListCoursesAction $action)
    {
        return $action->handle($request);
    }

    /**
     * Store a new course using the given request and action.
     *
     * @param CreateCourseRequest $request The request object containing the course data.
     * @param CreateCourseAction $action The action object responsible for handling the creation of the course.
     * @return JsonResponse The result of handling the creation action.
     */
    public function store(CreateCourseRequest $request, CreateCourseAction $action)
    {
        return $action->handle($request);
    }

    /**
     * Display the specified course using the given action.
     *
     * @param ShowCourseAction $action The action object responsible for handling the display of the course.
     * @return JsonResponse The result of handling the display action.
     */
    public function show(Course $course, ShowCourseAction $action)
    {
        return $action->handle($course);
    }

    public function update(Course $course, UpdateCourseRequest $request, UpdateCourseAction $action)
    {
        return $action->handle($course, $request);
    }
}
