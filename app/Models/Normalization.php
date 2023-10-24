<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalization extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'perilaku', 'penampilan', 'kedisiplinan', 'knowledge', 'inovasi'];
}
