<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|max:255',
            'registration' => 'required|max:10',
            'birth_date' => 'required|date',
            'course_id' => 'required',
        ];
    }

    public function parameters()
    {
        return [
            'name' => $this->name,
            'registration' => $this->registration,
            'birth_date' => $this->birth_date,
            'course_id' => $this->course_id,
        ];
    }
}
