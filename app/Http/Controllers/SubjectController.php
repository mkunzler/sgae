<?php

namespace App\Http\Controllers;

use App\Enums\EnumCourseModality;
use App\Enums\EnumUserPermission;
use App\Http\Requests\SubjectRequest;
use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        self::$data['enumCourseModality'] = EnumCourseModality::class;
    }

    public function index(Course $course)
    {
        self::$data['course'] = $course;
        self::$data['subjects'] = Subject::where('course_id', $course->id)->get()->sortBy('name');
        return view('subjects/list', self::$data);
    }

    public function add()
    {
        self::$data['courses'] = Course::all()->sortBy('name');
        return view('subjects/add', self::$data);
    }

    public function multiple(Course $course)
    {
        self::$data['course_id'] = $course->id;
        self::$data['courses'] = Course::all()->sortBy('name');
        return view('subjects/multiple', self::$data);
    }

    public function edit(Subject $subject)
    {
        self::$data['subject'] = $subject;
        self::$data['courses'] = Course::all()->sortBy('name');
        self::$data['teachers'] = User::where('permission', EnumUserPermission::TEACHER)->get();
        return view('subjects/edit', self::$data);
    }

    public function create(SubjectRequest $request): RedirectResponse
    {
        Subject::create($request->parameters());
        return redirect('/subjects')->with('success', 'Disciplina cadastrada!');
    }

    public function update(SubjectRequest $request, Subject $subject): RedirectResponse
    {
        $subject->update($request->parameters());
        return redirect("/subjects/{$subject->course_id}")->with('success', 'Disciplina atualizada!');
    }

    public function delete(Subject $subject)
    {
        $courseId = $subject->course_id;
        $subject->delete();
        return redirect("/subjects/{$courseId}")->with('success', 'Disciplina excluída!');
    }

    public function courses()
    {
        return response()->json(Course::all()->sortBy('name'));
    }

    public function multipleCreate(Request $request)
    {
        $request->validate([
            'subjects.*.name' => 'required|max:255',
            'subjects.*.course_id' => 'required',
        ],
        [
            'subjects.*.name' => 'O campo nome é obrigatório.',
            'subjects.*.course_id' => 'O campo curso é obrigatório.',
        ]
        );
        foreach ($request->subjects as $subject) {
            Subject::create($subject);
        }
        return redirect('/courses')->with('success', 'Disciplinas cadastradas!');
    }

    public function generateReport(Subject $subject)
    {
        $subjects = $subject->all();
        $data = [
            // 'title' => 'How To Create PDF File Using DomPDF In Laravel 9 - Techsolutionstuff',
            'date' => date('d/m/Y'),
            'subjects' => $subjects
        ];

        $pdf = Pdf::loadView('subjects/report', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('disciplinas.pdf');
    }
}
