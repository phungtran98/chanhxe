<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chanhxe extends Authenticatable
{
    use Notifiable;

    protected $table = 'chanhxe';
    protected $guard = 'chanhxe';

    protected $primaryKey = 'cx_id';

    protected $fillable = [
        'cx_ten',
        'cx_sdt',
        'cx_sdt',
        'cx_hinhanh',
        'cx_diachi',
        'cx_email',
        'cx_cmnd',
        'cx_kinhdo',
        'cx_vido',
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