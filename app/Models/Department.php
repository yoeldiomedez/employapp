<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
