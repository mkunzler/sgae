<?php

namespace App\Http\Controllers;

use App\Enums\EnumCourseModality;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        self::$data['enumCourseModality'] = EnumCourseModality::class;
    }

    public function index(Course $course)
    {
        self::$data['courses'] = $course->all()->sortBy('name');
        return view('courses/list', self::$data);
    }

    public function add()
    {
        return view('courses/add', self::$data);
    }

    public function edit(Course $course)
    {
        self::$data['course'] = $course;
        return view('courses/edit', self::$data);
    }

    public function create(CourseRequest $request): RedirectResponse
    {
        Course::create($request->parameters());
        return redirect('/courses')->with('success', 'Curso cadastrado!');
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->parameters());
        return redirect('/courses')->with('success', 'Curso atualizado!');
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect('/courses')->with('success', 'Curso excluído!');
    }
}
