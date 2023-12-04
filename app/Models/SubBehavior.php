<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBehavior extends Model
{
    use HasFactory;

    protected $fillable = ['behavior_id', 'station_routine', 'breefing', 'standby', 'koordinasi'];

    public function behavior()
    {
        return $this->belongsTo(Behavior::class);
    }
}
