<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama', 'tempat_lahir', 'tgl_lahir', 'umur', 'jabatan', 'telp', 'alamat'];

    public function behavior()
    {
        return $this->hasOne(Behavior::class);
    }

    public function appearance()
    {
        return $this->hasOne(Appearance::class);
    }

    public function discipline()
    {
        return $this->hasOne(Discipline::class);
    }

    public function inovation()
    {
        return $this->hasOne(Inovation::class);
    }

    public function knowledge()
    {
        return $this->hasOne(Knowledge::class);
    }

    public function rank()
    {
        return $this->hasOne(Rank::class);
    }
}
