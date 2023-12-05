<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Appearance;
use App\Models\Behavior;
use App\Models\Discipline;
use App\Models\Employee;
use App\Models\Inovation;
use App\Models\Knowledge;
use App\Models\Normalization;
use App\Models\Rank;
use App\Models\SubAppearance;
use App\Models\SubBehavior;
use App\Models\SubDiscipline;
use App\Models\SubKnowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['behavior', 'appearance', 'discipline', 'inovation', 'knowledge'])->whereIn('id', function($query) {
            $query->select('employee_id')->from('behaviors');
        })->get();
        return view('admin.evaluation.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.evaluation.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvaluationRequest $evaluationRequest)
    {
        DB::beginTransaction();
        try {
            $validated = $evaluationRequest->validated();

            $behavior = Behavior::create([
                'employee_id' => $validated['karyawan'],
                'perilaku' => ($validated['station_routine'] + $validated['breefing'] + $validated['standby'] + $validated['koordinasi']) / 4
            ]);
            $appearance = Appearance::create([
                'employee_id' => $validated['karyawan'],
                'penampilan' => ($validated['kerapihan'] + $validated['kesesuaian'] + $validated['alat_perlindungan']) / 3
            ]);
            $discipline = Discipline::create([
                'employee_id' => $validated['karyawan'],
                'disiplin' => ($validated['kehadiran'] + $validated['kegiatan']) / 2
            ]);
            $knowledge = Knowledge::create([
                'employee_id' => $validated['karyawan'],
                'knowledge' => ($validated['soft_skills'] + $validated['hard_skills'] + $validated['aktif'] + $validated['pricipal_objective']) / 4
            ]);
            $inovation = Inovation::create([
                'employee_id' => $validated['karyawan'],
                'inovasi' => $validated['inovasi']
            ]);

            $subBehavior = SubBehavior::create([
                'behavior_id' => $behavior->id,
                'station_routine' => $validated['station_routine'],
                'breefing' => $validated['breefing'],
                'standby' => $validated['standby'],
                'koordinasi' => $validated['koordinasi'],
            ]);
            $subAppearance = SubAppearance::create([
                'appearance_id' => $appearance->id,
                'kerapian' => $validated['kerapihan'],
                'kesesuaian' => $validated['kesesuaian'],
                'alat_perlindungan' => $validated['alat_perlindungan'],
            ]);
            $subDiscipline = SubDiscipline::create([
                'discipline_id' => $discipline->id,
                'kehadiran' => $validated['kehadiran'],
                'kegiatan' => $validated['kegiatan'],
            ]);
            $subKnowledge = SubKnowledge::create([
                'knowledge_id' => $knowledge->id,
                'soft_skills' => $validated['soft_skills'],
                'hard_skills' => $validated['hard_skills'],
                'aktif' => $validated['aktif'],
                'pricipal_objective' => $validated['pricipal_objective'],
            ]);

            $normalization = Normalization::create([
                'employee_id' => $validated['karyawan'],
            ]);

            $rank = Rank::create([
                'employee_id' => $validated['karyawan'],
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
        $evaluation = Employee::with(['behavior', 'appearance', 'discipline', 'inovation', 'knowledge'])->where('id', $id)->first();
        $employees = Employee::all();
        return view('admin.evaluation.edit', compact('employees', 'evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $updateEvaluationRequest, string $id)
    {
        DB::beginTransaction();
        try {
            $employee = Employee::with(['behavior', 'appearance', 'discipline', 'inovation', 'knowledge'])->where('id', $id)->first();
    
            $validated = $updateEvaluationRequest->validated();

            $behavior = $employee->behavior->update([
                'employee_id' => $validated['karyawan'],
                'perilaku' => ($validated['station_routine'] + $validated['breefing'] + $validated['standby'] + $validated['koordinasi']) / 4
            ]);
            $appearance = $employee->appearance->update([
                'employee_id' => $validated['karyawan'],
                'penampilan' => ($validated['kerapihan'] + $validated['kesesuaian'] + $validated['alat_perlindungan']) / 3
            ]);
            $discipline = $employee->discipline->update([
                'employee_id' => $validated['karyawan'],
                'disiplin' => ($validated['kehadiran'] + $validated['kegiatan']) / 2
            ]);
            $knowledge = $employee->knowledge->update([
                'employee_id' => $validated['karyawan'],
                'knowledge' => ($validated['soft_skills'] + $validated['hard_skills'] + $validated['aktif'] + $validated['pricipal_objective']) / 4
            ]);
            $inovation = $employee->inovation->update([
                'employee_id' => $validated['karyawan'],
                'inovasi' => $validated['inovasi']
            ]);

            $subBehavior = $employee->behavior->subBehavior->update([
                'station_routine' => $validated['station_routine'],
                'breefing' => $validated['breefing'],
                'standby' => $validated['standby'],
                'koordinasi' => $validated['koordinasi'],
            ]);
            $subAppearance = $employee->appearance->subAppearance->update([
                'kerapian' => $validated['kerapihan'],
                'kesesuaian' => $validated['kesesuaian'],
                'alat_perlindungan' => $validated['alat_perlindungan'],
            ]);
            $subDiscipline = $employee->discipline->subDiscipline->update([
                'kehadiran' => $validated['kehadiran'],
                'kegiatan' => $validated['kegiatan'],
            ]);
            $subKnowledge = $employee->knowledge->subKnowledge->update([
                'soft_skills' => $validated['soft_skills'],
                'hard_skills' => $validated['hard_skills'],
                'aktif' => $validated['aktif'],
                'pricipal_objective' => $validated['pricipal_objective'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        return redirect()->route('penilaian.index')->with('status', 'Data Penilaian karyawan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $employee = Employee::with(['behavior', 'appearance', 'discipline', 'inovation', 'knowledge'])->where('id', $id)->first();

        $employee->behavior->subBehavior->delete();
        $employee->behavior->delete();
        $employee->appearance->subAppearance->delete();
        $employee->appearance->delete();
        $employee->discipline->subDiscipline->delete();
        $employee->discipline->delete();
        $employee->knowledge->subKnowledge->delete();
        $employee->knowledge->delete();
        $employee->inovation->delete();
        $employee->rank->delete();

        return redirect()->route('penilaian.index')->with('status', 'Data Penilaian karyawan berhasil di edit');
    }
}
