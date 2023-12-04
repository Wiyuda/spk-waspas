<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAppearance extends Model
{
    use HasFactory;

    protected $fillable = ['appearance_id', 'kerapian', 'kesesuaian', 'alat_perlindungan'];

    public function appearance()
    {
        return $this->belongsTo(Appearance::class);
    }
}
