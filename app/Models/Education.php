<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'degree_id', 
        'country_id', 
        'specialty',
        'degree_date',
        'college',
        'city',
        'degree_file',
        'degree_status',
        'description',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }    

    public function country()
    {
       return $this->belongsTo(Country::class);
    } 
}
