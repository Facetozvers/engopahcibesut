<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number', 'password', 'role','user_id','number','prefix'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','number','prefix'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $dateM = date('m', time());
            $dateY = date('y', time());
            $model->prefix = $dateM.$dateY;
            $model->number = User::where('prefix', $model->prefix)->max('number') + 1;
            $model->user_id = 'U'.$model->prefix.str_pad($model->number,3,'0',STR_PAD_LEFT);

        });
    }
}
