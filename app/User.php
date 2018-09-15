<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    protected $guarded = [
        'is_admin',
    ];

    public static function findByEmail($email)
    {
        return static::where(conpact('email'))->first();

    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
    public function isAdmin()
    {
        return $this->email == 'jbello262@gmail.com';
    }

}