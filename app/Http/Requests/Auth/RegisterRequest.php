<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name' => ['required', 'regex:/^[A-Za-z]+$/', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*\d).+$/'],
        ];
    }
    public function messages()
{
    return [
        'password.regex' => 'Password must contain capital letters, lowercase letters, numbers, and symbols.',
    ];
}
}
