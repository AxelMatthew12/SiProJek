<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'email',
        'password',
        'profile_picture',
        'bio'
    ];

    protected $hidden = ['password'];
    protected $casts = ['password' => 'hashed'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }
}
