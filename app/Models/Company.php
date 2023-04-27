<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'ruc', 
        'address', 
        'phone_or_mobile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    
    
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
