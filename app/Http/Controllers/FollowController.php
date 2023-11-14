<?php

namespace App\Http\Controllers;

use App\Enums\EnumUserPermission;
use App\Http\Requests\FollowRequest;
use App\Models\Follow;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;

class FollowController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Student $student)
    {
        self::$data['student'] = $student;
        self::$data['follows'] = Follow::where('student_id', $student->id)->get();
        return view('follows/list', self::$data);
    }

    public function add(Student $student)
    {
        self::$data['student'] = $student;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['subjects'] = Subject::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['teachers'] = User::where('permission', EnumUserPermission::TEACHER)->get()->sortBy('name');
        return view('follows/add', self::$data);
    }

    public function edit(Follow $follow, Student $student)
    {
        self::$data['follow'] = $follow;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['subjects'] = Subject::where('course_id', $student->course_id)->get()->sortBy('title');
        self::$data['teachers'] = User::where('permission', EnumUserPermission::TEACHER)->get()->sortBy('name');
        return view('follows/edit', self::$data);
    }

    public function create(FollowRequest $request): RedirectResponse
    {
        Follow::create($request->parameters());
        return redirect("/acompanhamentos/{$request->student_id}")->with('success', 'Acompanhamento cadastrado!');
    }

    public function update(FollowRequest $request, Follow $follow): RedirectResponse
    {
        $follow->update($request->parameters());
        return redirect("/acompanhamentos/{$request->student_id}")->with('success', 'Acompanhamento atualizado!');
    }

    public function delete(Follow $follow)
    {
        $studentId = $follow->student_id;
        $follow->delete();
        return redirect("/acompanhamentos/{$studentId}")->with('success', 'Acompanhamento excluído!');
    }

    public function generateReport(Follow $follow)
    {
        $data = [
            'follow' => $follow
        ];

        $pdf = Pdf::loadView('follows/report', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download("Acompanhamento - {$follow->student->name} - {$follow->subject->name}.pdf");
    }
}
