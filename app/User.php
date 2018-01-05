<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public static function findByEmail($email)
    {
//        return User::where(compact('email'))->first();
        return static::where(compact('email'))->first(); //Es lo mismo poner static, porque estamos en la clase User.
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
