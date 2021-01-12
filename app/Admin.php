<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable{
    use Notifiable;

    protected $table = 'admin';
    protected $guard = 'admin';

    protected $primaryKey = 'ad_id';

    protected $fillable = [
        'ad_hoten',
        'username', 
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];
}
