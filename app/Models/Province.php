<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function districts()
    {
        return $this->belongsToMany(District::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
