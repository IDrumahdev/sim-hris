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
            'full_name'     => 'required|max:100',
            'birth_day'     => 'required|date',
            'gender'        => 'required|in:Pria,Perempuan',
            'mobilephone'   => 'required|min:10|max:13',
            'email'         => 'required|email|unique:employees,email',
            'date_of_entry' => 'required|date',
            'job_title_id'  => 'required',
            'department_id' => 'required',
            'address'       => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required'        => 'Kolom nama lengkap harus diisi.',
            'full_name.max'             => 'Nama lengkap maksimal 100 karakter.',
            'birth_day.required'        => 'Kolom tanggal lahir harus diisi.',
            'birth_day.date'            => 'Kolom tanggal lahir harus berupa tanggal.',
            'gender.required'           => 'Kolom jenis kelamin harus diisi.',
            'gender.in'                 => 'Jenis kelamin harus Pria atau Perempuan.',
            'mobilephone.required'      => 'Kolom nomor telepon harus diisi.',
            'mobilephone.min'           => 'Nomor telepon minimal 10 karakter.',
            'mobilephone.max'           => 'Nomor telepon maksimal 13 karakter.',
            'email.required'            => 'Kolom email harus diisi.',
            'email.email'               => 'Email harus berupa alamat email yang valid.',
            'email.unique'              => 'Email sudah digunakan oleh pengguna lain.',
            'date_of_entry.required'    => 'Kolom tanggal masuk harus diisi.',
            'date_of_entry.date'        => 'Kolom tanggal masuk harus berupa tanggal.',
            'job_title_id.required'     => 'Kolom ID jabatan harus diisi.',
            'department_id.required'    => 'Kolom ID departemen harus diisi.',
            'address.required'          => 'Kolom alamat harus diisi.',
            'address.max'               => 'Alamat maksimal 255 karakter.',
        ];
    }

}
