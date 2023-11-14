<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Student $student)
    {
        self::$data['students'] = $student->all()->sortBy('name');
        return view('students/list', self::$data);
    }

    public function add()
    {
        self::$data['courses'] = Course::all()->sortBy('name');
        return view('students/add', self::$data);
    }

    public function edit(student $student)
    {
        self::$data['courses'] = Course::all()->sortBy('name');
        self::$data['student'] = $student;
        return view('students/edit', self::$data);
    }

    public function create(StudentRequest $request): RedirectResponse
    {
        Student::create($request->parameters());
        return redirect('/students')->with('success', 'Usuário cadastrado!');
    }

    public function update(StudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->parameters());
        return redirect('/students')->with('success', 'Usuário atualizado!');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect('/students')->with('success', 'Usuário excluído!');
    }
}
