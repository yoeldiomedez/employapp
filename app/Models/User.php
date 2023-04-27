<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni', 
        'name', 
        'paternal_surname', 
        'maternal_surname', 
        'birth_date', 
        'gender', 
        'email', 
        'password',
        'profile_picture',
        'applying',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class)->withPivot('selected');
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }
}
