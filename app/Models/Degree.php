<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function education()
    {
        return $this->hasMany(Education::class);
    }
}
