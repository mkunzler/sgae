<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FollowRequest extends FormRequest
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
            'adaptation_attempts' => 'required',
            'semester_id' => 'required',
            'student_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ];
    }

    public function parameters()
    {
        return [
            'adaptation_attempts' => $this->adaptation_attempts,
            'semester_id' => $this->semester_id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
        ];
    }
}
