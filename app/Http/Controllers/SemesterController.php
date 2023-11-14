<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemesterRequest;
use App\Models\Course;
use App\Models\Semester;
use App\Models\SemesterSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SemesterController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Semester $semester)
    {
        self::$data['semesters'] = $semester->all()->sortBy('title');
        return view('semesters/list', self::$data);
    }

    public function add()
    {
        self::$data['courses'] = Course::all()->sortBy('name');
        return view('semesters/add', self::$data);
    }

    public function edit(Semester $semester)
    {
        self::$data['courses'] = Course::all()->sortBy('name');
        self::$data['semester'] = $semester;
        return view('semesters/edit', self::$data);
    }

    public function create(SemesterRequest $request): RedirectResponse
    {
        Semester::create($request->parameters());
        return redirect('/semesters')->with('success', 'Semestre cadastrado!');
    }

    public function update(SemesterRequest $request, Semester $semester): RedirectResponse
    {
        $semester->update($request->parameters());
        return redirect('/semesters')->with('success', 'Semestre atualizado!');
    }

    public function delete(Semester $semester)
    {
        $semester->delete();
        return redirect('/semesters')->with('success', 'Semestre excluído!');
    }

    public function subjects(Semester $semester)
    {
        self::$data['semester'] = $semester;
        self::$data['course'] = Course::find($semester->course_id);
        self::$data['subjects'] = Subject::where('course_id', $semester->course_id)->get();
        // self::$data['semester_subjects'] = SemesterSubject::where('semester_id', $semester->id)->get();
        // foreach (self::$data['subjects'] as $subject) {
        //     if ($subject->id = array_keys(array_column(self::$data['semester_subjects'], 'subject_id'), 1)) {
        //         echo $subject->name;
        //     }
        // }
        return view('semesters/subjects', self::$data);
    }

    public function store(Request $request, Semester $semester)
    {
        foreach ($request->subjects as $subject) {
            SemesterSubject::create([
                'semester_id' => $semester->id,
                'subject_id' => $subject,
            ]);
        }
        return redirect('/semesters')->with('success', 'Disciplinas adicionadas ao semestre!');
    }
}
