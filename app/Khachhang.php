<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Khachhang extends Authenticatable
{
    use Notifiable;

    protected $table = 'khachhang';
    protected $guard = 'khachhang';

    protected $primaryKey = 'kh_id';

    protected $fillable = [
        // 'nv_id',
        'kh_ten',
        'kh_sdt',
        'kh_sdt',
        'kh_hinhanh',
        'kh_diachi',
        'kh_email',
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