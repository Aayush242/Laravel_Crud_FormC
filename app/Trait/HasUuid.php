<?php

namespace App\Trait;

use Illuminate\Support\Str;

trait Hasuuid
{
    protected static function bootHasuuid(){

        static::creating(function($model){
            if(empty($model->id)) {
                $model->id = Str::uuid();
            }
        });
    }
}

?>