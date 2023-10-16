<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|numeric|max_digits:16',
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|numeric|max_digits:3',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'telp' => 'required|numeric|max_digits:13'
        ]);

        $employee = new Employee($validated);   
        $employee->save();

        return redirect()->route('karyawan.index')->with('status', 'Data karyawan berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $validated = $request->validate([
            'nik' => 'required|numeric|max_digits:16',
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|numeric|max_digits:3',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'telp' => 'required|numeric|max_digits:13'
        ]);

        $employee->update($validated);

        return redirect()->route('karyawan.index')->with('status', 'Data karyawan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();

        return redirect()->route('karyawan.index')->with('status', 'Data karyawan berhasil di hapus');
    }
}
