<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'perilaku'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function subBehavior()
    {
        return $this->hasOne(SubBehavior::class);
    }
}
