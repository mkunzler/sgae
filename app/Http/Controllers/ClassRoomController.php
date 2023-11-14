<?php

namespace App\Http\Controllers;

use App\Enums\EnumSituation;
use App\Enums\EnumUserPermission;
use App\Enums\EnumWorkload;
use App\Http\Requests\ClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ClassRoomController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        self::$data['enumSituation'] = EnumSituation::class;
        self::$data['enumWorkload'] = EnumWorkload::class;
    }

    public function index(Student $student)
    {
        self::$data['student'] = $student;
        self::$data['classRooms'] = ClassRoom::where('student_id', $student->id)->get();
        return view('classRooms/list', self::$data);
    }

    public function add(Student $student)
    {
        self::$data['student'] = $student;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['teachers'] = User::where('permission', EnumUserPermission::TEACHER)->get()->sortBy('name');
        self::$data['subjects'] = Subject::all()->sortBy('name');
        return view('classRooms/add', self::$data);
    }

    public function edit(ClassRoom $classRoom, Student $student)
    {
        self::$data['classRoom'] = $classRoom;
        self::$data['student'] = $student;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['teachers'] = User::where('permission', EnumUserPermission::TEACHER)->get()->sortBy('name');
        self::$data['subjects'] = Subject::all()->sortBy('name');
        return view('classRooms/edit', self::$data);
    }

    public function create(ClassRoomRequest $request): RedirectResponse
    {
        ClassRoom::create($request->parameters());
        return redirect("/salas/{$request->student_id}")->with('success', 'Turma cadastrada!');
    }

    public function update(ClassRoomRequest $request, ClassRoom $classRoom): RedirectResponse
    {
        $classRoom->update($request->parameters());
        return redirect("/salas/{$request->student_id}")->with('success', 'Turma atualizada!');
    }

    public function delete(ClassRoom $classRoom)
    {
        $classRoom->delete();
        return redirect("/salas/{$classRoom->student_id}")->with('success', 'Turma excluída!');
    }

}
