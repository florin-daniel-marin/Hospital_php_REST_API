<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'employee_type',
        'username',
        'email',
        'password',
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

    //eloquent relationship between tables:
    public function isAccount(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'employee_type', 'employee_type_id');
    }


    //more users:
    public function isGM() {
        if (Auth::user()->employee_type =="General Manager")
        return 1; else return 0;

    }

    public function isDoctor() {
        if (Auth::user()->employee_type =="Doctor")
        return 1; else return 0;
    }
    
    public function isAssistant() {
        if (Auth::user()->employee_type =="Assistant")
        return 1; else return 0;
    }

    
}
