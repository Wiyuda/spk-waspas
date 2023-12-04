<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKnowledge extends Model
{
    use HasFactory;

    protected $fillable = ['knowledge_id', 'soft_skills', 'hard_skills', 'aktif', 'pricipal_objective'];

    public function knowledge()
    {
        return $this->belongsTo(Knowledge::class);
    }
}
