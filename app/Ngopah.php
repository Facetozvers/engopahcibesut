<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngopah extends Model
{
    //fungsi membuat req_id
    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $dateM = date('m', time());
            $dateY = date('y', time());
            $model->prefix = $dateM.$dateY;
            $model->number = Ngopah::where('prefix', $model->prefix)->max('number') + 1;
            $model->req_id = 'R'.$model->prefix.str_pad($model->number,4,'0',STR_PAD_LEFT);

        });
    }
}
