<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Normalization;
use App\Models\Rank;
use Illuminate\Http\Request;

class RangkingProcessController extends Controller
{
    public function rangking()
    {
        $evaluations = Employee::with(['behavior', 'appearance', 'discipline', 'inovation', 'knowledge'])->whereIn('id', function($query) {
            $query->select('employee_id')->from('behaviors');
        })->get();
                    
        foreach($evaluations as $evaluation) {
            $behavior = $evaluation->behavior->max('perilaku');
            $appearance = $evaluation->appearance->max('penampilan');
            $discipline = $evaluation->discipline->max('disiplin');
            $knowledge = $evaluation->knowledge->max('knowledge');
            $inovation = $evaluation->inovation->max('inovasi');

            $behaviorNormalization = ($evaluation->behavior->perilaku / $behavior);
            $appearanceNormalization = ($evaluation->appearance->penampilan / $appearance);
            $disciplineNormalization = ($evaluation->discipline->disiplin / $discipline);
            $knowledgeNormalization = ($evaluation->knowledge->knowledge / $knowledge);
            $inovationNormalization = ($evaluation->inovation->inovasi / $inovation);
            
            $normalization = Normalization::where('employee_id', $evaluation->id)->update([
                'employee_id' => $evaluation->id,
                'perilaku' => $behaviorNormalization,
                'penampilan' => $appearanceNormalization,
                'kedisiplinan' => $disciplineNormalization,
                'knowledge' => $knowledgeNormalization,
                'inovasi' => $inovationNormalization
            ]);
        }

        $normalizations = Normalization::all();

        foreach($normalizations as $normalization) {
            $preferences = ($normalization->perilaku * 0.3) + ($normalization->penampilan * 0.05) + ($normalization->kedisiplinan * 0.3) + ($normalization->knowledge * 0.3) + ($normalization->inovasi * 0.05);
            
            $rank = Rank::where('employee_id', $normalization->employee_id)->update([
                'preferensi' => $preferences,
                'date' => date('Y-m-d')
            ]);
        }

        $ranks = Rank::with(['employee'])
            ->orderBy('preferensi', 'desc')
            ->get();
        
        return view('admin.rangking.index', compact('ranks'));
    }
}
