<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->count();
        return view('admin.dashboard', compact('employee'));
    }
}
