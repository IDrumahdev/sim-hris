<?php

namespace App\Http\Requests\Data\Employee;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name'     => 'required|string|max:30',
            'birth_day'     => 'required|string|max:30',
            'gender'        => 'required|string|max:30',
            'mobilephone'   => 'required|string|max:30',
            'email'         => 'required|string|max:30',
            'date_of_entry' => 'required|string|max:30',
            'job_title'     => 'required|string|max:30',
            'departments'   => 'required|string|max:30',
            'address'       => 'required|string|max:30',
        ];
    }
}
