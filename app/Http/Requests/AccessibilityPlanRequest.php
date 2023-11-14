<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessibilityPlanRequest extends FormRequest
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
            'deficiency' => 'required',
            'chronogram' => 'required',
            'objective' => 'required',
            'methodology' => 'required',
            'instrument' => 'required',
            'student_id' => 'required',
            'semester_id' => 'required',
        ];
    }

    public function parameters()
    {
        return [
            'deficiency' => $this->deficiency,
            'chronogram' => $this->chronogram,
            'objective' => $this->objective,
            'methodology' => $this->methodology,
            'instrument' => $this->instrument,
            'student_id' => $this->student_id,
            'semester_id' => $this->semester_id,
        ];
    }
}
