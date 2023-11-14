<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, Course $course, Student $student)
    {
        $courses = $course->count();
        $users = $user->count();
        $students = $student->count();
        return view('home', compact(['courses', 'users', 'students']));
    }
}
