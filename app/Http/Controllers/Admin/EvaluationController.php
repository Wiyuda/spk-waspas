<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\NumericalAssesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluation::with('employee')->latest()->get();
        return view('admin.evaluation.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $looks = ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Buruk'];
        $disciplines = ['Sangat Disiplin', 'Disiplin', 'Cukup Disiplin', 'Kurang Disiplin', 'Buruk'];
        $knowledges = ['A', 'B', 'C', 'D', 'E'];
        return view('admin.evaluation.create', compact('employees', 'looks', 'disciplines', 'knowledges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvaluationRequest $evaluationRequest)
    {
        DB::beginTransaction();
        try {
            $validated = $evaluationRequest->validated();

            if($validated['perilaku'] == 'Sangat Baik') {
                $behavior = 5;
            } elseif($validated['perilaku'] == 'Baik') {
                $behavior = 4;
            } elseif($validated['perilaku'] == 'Cukup Baik') {
                $behavior = 3;
            } elseif($validated['perilaku'] == 'Kurang Baik') {
                $behavior = 2;
            } elseif($validated['perilaku'] == 'Buruk') {
                $behavior = 1;
            }

            if($validated['penampilan'] == 'Sangat Baik') {
                $appearance = 5;
            } elseif($validated['penampilan'] == 'Baik') {
                $appearance = 4;
            } elseif($validated['penampilan'] == 'Cukup Baik') {
                $appearance = 3;
            } elseif($validated['penampilan'] == 'Kurang Baik') {
                $appearance = 2;
            } elseif($validated['penampilan'] == 'Buruk') {
                $appearance = 1;
            }

            if($validated['kedisiplinan'] == 'Sangat Disiplin') {
                $discipline = 5;
            } elseif($validated['kedisiplinan'] == 'Disiplin') {
                $discipline = 4;
            } elseif($validated['kedisiplinan'] == 'Cukup Disiplin') {
                $discipline = 3;
            } elseif($validated['kedisiplinan'] == 'Kurang Disiplin') {
                $discipline = 2;
            } elseif($validated['kedisiplinan'] == 'Buruk') {
                $discipline = 1;
            }

            if($validated['knowledge'] == 'A') {
                $knowledge = 5;
            } elseif($validated['knowledge'] == 'B') {
                $knowledge = 4;
            } elseif($validated['knowledge'] == 'C') {
                $knowledge = 3;
            } elseif($validated['knowledge'] == 'D') {
                $knowledge = 2;
            } elseif($validated['knowledge'] == 'E') {
                $knowledge = 1;
            }

            if($validated['inovasi'] == 'A') {
                $inovation = 5;
            } elseif($validated['inovasi'] == 'B') {
                $inovation = 4;
            } elseif($validated['inovasi'] == 'C') {
                $inovation = 3;
            } elseif($validated['inovasi'] == 'D') {
                $inovation = 2;
            } elseif($validated['inovasi'] == 'E') {
                $inovation = 1;
            }

            $evaluation = new Evaluation($validated);
            $evaluation['employee_id'] = $validated['karyawan'];
            $evaluation->save();

            $numericalAsessment = NumericalAssesment::create([
                'employee_id' => $validated['karyawan'],
                'perilaku' => $behavior,
                'penampilan' => $appearance,
                'kedisiplinan' => $discipline,
                'knowledge' => $knowledge,
                'inovasi' => $inovation,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            return back();
        }

        return redirect()->route('penilaian.index')->with('status', 'Data Penilaian karyawan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluation = Evaluation::find($id);
        $employees = Employee::all();
        $looks = ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Buruk'];
        $disciplines = ['Sangat Disiplin', 'Disiplin', 'Cukup Disiplin', 'Kurang Disiplin', 'Buruk'];
        $knowledges = ['A', 'B', 'C', 'D', 'E'];
        return view('admin.evaluation.edit', compact('employees', 'looks', 'disciplines', 'knowledges', 'evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $updateEvaluationRequest, string $id)
    {
        DB::beginTransaction();
        try {
            $evaluation = Evaluation::find($id);
            $numericalAsessment = NumericalAssesment::find($id);
    
            $validated = $updateEvaluationRequest->validated();

            if($validated['perilaku'] == 'Sangat Baik') {
                $behavior = 5;
            } elseif($validated['perilaku'] == 'Baik') {
                $behavior = 4;
            } elseif($validated['perilaku'] == 'Cukup Baik') {
                $behavior = 3;
            } elseif($validated['perilaku'] == 'Kurang Baik') {
                $behavior = 2;
            } elseif($validated['perilaku'] == 'Buruk') {
                $behavior = 1;
            }

            if($validated['penampilan'] == 'Sangat Baik') {
                $appearance = 5;
            } elseif($validated['penampilan'] == 'Baik') {
                $appearance = 4;
            } elseif($validated['penampilan'] == 'Cukup Baik') {
                $appearance = 3;
            } elseif($validated['penampilan'] == 'Kurang Baik') {
                $appearance = 2;
            } elseif($validated['penampilan'] == 'Buruk') {
                $appearance = 1;
            }

            if($validated['kedisiplinan'] == 'Sangat Disiplin') {
                $discipline = 5;
            } elseif($validated['kedisiplinan'] == 'Disiplin') {
                $discipline = 4;
            } elseif($validated['kedisiplinan'] == 'Cukup Disiplin') {
                $discipline = 3;
            } elseif($validated['kedisiplinan'] == 'Kurang Disiplin') {
                $discipline = 2;
            } elseif($validated['kedisiplinan'] == 'Buruk') {
                $discipline = 1;
            }

            if($validated['knowledge'] == 'A') {
                $knowledge = 5;
            } elseif($validated['knowledge'] == 'B') {
                $knowledge = 4;
            } elseif($validated['knowledge'] == 'C') {
                $knowledge = 3;
            } elseif($validated['knowledge'] == 'D') {
                $knowledge = 2;
            } elseif($validated['knowledge'] == 'E') {
                $knowledge = 1;
            }

            if($validated['inovasi'] == 'A') {
                $inovation = 5;
            } elseif($validated['inovasi'] == 'B') {
                $inovation = 4;
            } elseif($validated['inovasi'] == 'C') {
                $inovation = 3;
            } elseif($validated['inovasi'] == 'D') {
                $inovation = 2;
            } elseif($validated['inovasi'] == 'E') {
                $inovation = 1;
            }

            $evaluation->update($validated);
            $evaluation['employee_id'] = $validated['karyawan'];
            $evaluation->save();

            $numericalAsessment->update([
                'employee_id' => $validated['karyawan'],
                'perilaku' => $behavior,
                'penampilan' => $appearance,
                'kedisiplinan' => $discipline,
                'knowledge' => $knowledge,
                'inovasi' => $inovation,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            return back();
        }

        return redirect()->route('penilaian.index')->with('status', 'Data Penilaian karyawan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Evaluation::find($id)->delete();
        NumericalAssesment::find($id)->delete();

        return redirect()->route('penilaian.index')->with('status', 'Data Penilaian karyawan berhasil di edit');
    }
}
