<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'penampilan'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function subAppearance()
    {
        return $this->hasOne(SubAppearance::class);
    }
}
