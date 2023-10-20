<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEvaluationRequest extends FormRequest
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
            'karyawan' => 'required|exists:employees,id', Rule::unique('evaluations')->ignore('employee_id', 'employee_id'), Rule::unique('numerical_accesments')->ignore('employee_id', 'employee_id'),
            'perilaku' => 'required|in:Sangat Baik,Baik,Cukup Baik,Kurang Baik,Buruk',
            'penampilan' => 'required|in:Sangat Baik,Baik,Cukup Baik,Kurang Baik,Buruk',
            'kedisiplinan' => 'required|in:Sangat Disiplin,Disiplin,Cukup Disiplin,Kurang Disiplin,Buruk',
            'knowledge' => 'required|in:A,B,C,D,E',
            'inovasi' => 'required|in:A,B,C,D,E',
        ];
    }
}
