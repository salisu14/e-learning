<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title'         => 'required|max:200',
            'code'          => 'required|string|max:50',
            'unit'          => 'required|integer',
            'level'         => 'required|string|max:50',
            'type'          => 'required|string|in:core,elective',
            'status'        => 'required|string|in:active,inactive',
            'semester'      => 'required|string|max:50',
        ];
    }
}
