<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $fillable = ['username','email','password','type'];
    protected $guarded = ['id'];

    use Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];

}
