<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|size:11|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }
    protected function passedValidation(): void
    {
        $this->merge([
            'password' => \Hash::make($this->password)
        ]);
    }
}
