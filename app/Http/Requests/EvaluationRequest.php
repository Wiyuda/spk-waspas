<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'karyawan' => 'required|exists:employees,id|unique:appearances,employee_id|unique:behaviors,employee_id|unique:disciplines,employee_id|unique:knowledge,employee_id|unique:inovations,employee_id',
            'station_routine' => 'required',
            'breefing' => 'required',
            'standby' => 'required',
            'koordinasi' => 'required',
            'kerapihan' => 'required',
            'kesesuaian' => 'required',
            'alat_perlindungan' => 'required',
            'kehadiran' => 'required',
            'kegiatan' => 'required',
            'soft_skills' => 'required',
            'hard_skills' => 'required',
            'aktif' => 'required',
            'pricipal_objective' => 'required',
            'inovasi' => 'required'
        ];
    }
}
