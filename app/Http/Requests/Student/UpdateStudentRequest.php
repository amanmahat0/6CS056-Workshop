<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $student = $this->route('student');
        $required = $this->isMethod('PATCH') ? 'sometimes|required' : 'required';

        return [
            'name' => "$required|string|max:255",
            'email' => [
                $required,
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'phone' => "$required|string|max:20",
            'address' => $this->isMethod('PATCH') ? 'sometimes|nullable|string|max:500' : 'nullable|string|max:500',
            'date_of_birth' => $this->isMethod('PATCH') ? 'sometimes|nullable|date' : 'nullable|date',
        ];
    }
}
