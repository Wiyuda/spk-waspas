<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDiscipline extends Model
{
    use HasFactory;

    protected $fillable = ['discipline_id', 'kehadiran', 'kegiatan'];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
