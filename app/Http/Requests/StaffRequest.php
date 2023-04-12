<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'department_id' => 'required',
            'photo' => 'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required'
        ];
    }
}
