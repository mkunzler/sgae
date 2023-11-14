<?php

namespace App\Http\Requests;

use App\Enums\EnumCourseModality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CourseRequest extends FormRequest
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
            'modality' => ['required', new Enum(EnumCourseModality::class)],
        ];
    }

    public function parameters()
    {
        return [
            'name' => $this->name,
            'modality' => $this->modality,
        ];
    }
}
