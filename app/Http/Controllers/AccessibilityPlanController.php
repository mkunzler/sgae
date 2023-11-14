<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityPlanRequest;
use App\Models\AccessibilityPlan;
use App\Models\Semester;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;

class AccessibilityPlanController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Student $student)
    {
        dd(session());
        self::$data['student'] = $student;
        self::$data['accessibilityPlans'] = AccessibilityPlan::where('student_id', $student->id)->get();
        return view('accessibilityPlans/list', self::$data);
    }

    public function add(Student $student)
    {
        self::$data['student'] = $student;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        return view('accessibilityPlans/add', self::$data);
    }

    public function edit(AccessibilityPlan $accessibilityPlan, Student $student)
    {
        self::$data['accessibilityPlan'] = $accessibilityPlan->find($accessibilityPlan->id);
        self::$data['student'] = $student;
        self::$data['semesters'] = Semester::where('course_id', $student->course_id)->get()->sortBy('title');
        return view('accessibilityPlans/edit', self::$data);
    }

    public function create(AccessibilityPlanRequest $request): RedirectResponse
    {
        AccessibilityPlan::create($request->parameters());
        return redirect("/planos/{$request->student_id}")->with('success', 'Plano cadastrado!');
    }

    public function update(AccessibilityPlanRequest $request, AccessibilityPlan $accessibilityPlan): RedirectResponse
    {
        $accessibilityPlan->update($request->parameters());
        return redirect("/planos/{$request->student_id}")->with('success', 'Plano atualizado!');
    }

    public function delete(AccessibilityPlan $accessibilityPlan)
    {
        $studentId = $accessibilityPlan->student_id;
        $accessibilityPlan->delete();
        return redirect("/planos/{$studentId}")->with('success', 'Plano excluído!');
    }

    public function generateReport(AccessibilityPlan $accessibilityPlan)
    {
        $data = [
            'accessibilityPlan' => $accessibilityPlan
        ];

        $pdf = Pdf::loadView('accessibilityPlans/report', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download("Plano {$accessibilityPlan->student->name}.pdf");
    }
}
