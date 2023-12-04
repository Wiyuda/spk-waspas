<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'knowledge'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function subKnowledge()
    {
        return $this->hasOne(SubKnowledge::class);
    }
}
