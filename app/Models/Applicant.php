<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'ruc',
        'cellphone_number',
        'marital_status',
        'address',
        'department_id',
        'province_id',
        'district_id',
        'tuition_number',
        'ffaa_file',
        'disability_file',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
