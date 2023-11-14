<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemesterRequest extends FormRequest
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
            'title' => 'required|max:45',
            'year' => 'required|digits:4|integer',
            'course_id' => 'required',
        ];
    }

    public function parameters()
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
            'course_id' => $this->course_id,
        ];
    }
}
