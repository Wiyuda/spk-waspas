<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'disiplin'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function subDiscipline()
    {
        return $this->hasOne(SubDiscipline::class);
    }
}
