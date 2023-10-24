<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Normalization;
use App\Models\NumericalAssesment;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RangkingProcessController extends Controller
{
    public function rangking()
    {
        $evaluations = NumericalAssesment::query()
            ->select('employee_id', 'perilaku', 'penampilan', 'kedisiplinan', 'knowledge', 'inovasi')
            ->get();

        foreach($evaluations as $evaluation) {
            $behavior = $evaluation->max('perilaku');
            $appearance = $evaluation->max('penampilan');
            $discipline = $evaluation->max('kedisiplinan');
            $knowledge = $evaluation->max('knowledge');
            $inovation = $evaluation->max('inovasi');


            $behaviorNormalization = ($evaluation->perilaku / $behavior);
            $appearanceNormalization = ($evaluation->penampilan / $appearance);
            $disciplineNormalization = ($evaluation->kedisiplinan / $discipline);
            $knowledgeNormalization = ($evaluation->knowledge / $knowledge);
            $inovationNormalization = ($evaluation->inovasi / $inovation);

            $normalization = Normalization::where('employee_id', $evaluation->employee_id)->update([
                'employee_id' => $evaluation->employee_id,
                'perilaku' => $behaviorNormalization,
                'penampilan' => $appearanceNormalization,
                'kedisiplinan' => $disciplineNormalization,
                'knowledge' => $knowledgeNormalization,
                'inovasi' => $inovationNormalization
            ]);
        }

        $normalizations = Normalization::all();

        foreach($normalizations as $normalization) {
            $preferensi = ($normalization->perilaku * 0.3) + ($normalization->penampilan * 0.05) + ($normalization->kedisiplinan * 0.3) + ($normalization->knowledge * 0.3) + ($normalization->inovasi * 0.05);

            $rank = Rank::where('employee_id', $normalization->employee_id)->update([
                'employee_id' => $normalization->employee_id,
                'preferensi' => $preferensi,
            ]);
        }

        $ranks = Rank::with(['employee'])
            ->orderBy('preferensi', 'desc')
            ->get();
        
        return view('admin.rangking.index', compact('ranks'));
    }
}
