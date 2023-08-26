<?php

namespace App\Http\Requests\Data\SaleryCut;

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
            'salary_cut_name'   => 'required|max:200',
            'nominal'           => 'required|integer|max:10000000000',
            'description'       => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'salary_cut_name.required'  => 'Kolom nama potongan gaji harus diisi.',
            'salary_cut_name.max'       => 'Nama potongan gaji maksimal 200 karakter.',
            'nominal.required'          => 'Kolom nominal harus diisi.',
            'nominal.integer'           => 'Nominal harus berupa angka.',
            'nominal.max'               => 'Nominal maksimal 10 miliar.',
            'description.string'        => 'Deskripsi harus berupa teks.',
        ];
    }
}
