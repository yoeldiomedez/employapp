<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'affidavit_file', 
        'dni_file', 
        'vacancy_file',
        'aditional_file',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }  
}
