<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required',
            'semester_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'situation' => 'required',
            'workload' => 'required',
        ];
    }

    public function parameters()
    {
        return [
            'student_id' => $this->student_id,
            'semester_id' => $this->semester_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'situation' => $this->situation,
            'workload' => $this->workload,
        ];
    }
}
