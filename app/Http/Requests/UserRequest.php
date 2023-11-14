<?php

namespace App\Http\Requests;

use App\Enums\EnumUserPermission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
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
            'email' => $this->method() === 'POST' ?
                'required|unique:users,email|email|max:255' :
                'required|unique:users,email,'.$this->user->id.'|email|max:255',
            'password' => $this->method() === 'POST' ? 'required|confirmed' : 'confirmed',
            'password_confirmation' => $this->method() === 'POST' ? 'required' : '',
            'permission' => ['required', new Enum(EnumUserPermission::class)],
        ];
    }

    public function parameters()
    {
        return [
            'name' => $this->name,
            'registration' => $this->registration,
            'email' => $this->email,
            'permission' => $this->permission,
            'password' => $this->method() === 'POST' ? Hash::make($this->password) : $this->user->password,
            'status' =>  $this->method() === 'POST' ? true : $this->user->status,
        ];
    }
}
