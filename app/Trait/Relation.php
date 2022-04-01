<?php

namespace App\Trait;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Relation{
    
    protected static function bootRelation(){
        
        static::saved(function($model)
        {   
            //module_name
            $model_name = class_basename($model);   
            $model_id = $model->getkey();

            //data of the selected field
            $fieldarr = array_keys(request()->all());  
            $field = last($fieldarr);
            $relation_name = trim($field, "_id");
            $field_lower = Str::lower($field);
            
            //recieve data from config file
            $value = (config('relationship.'.$model_name.'.'.$relation_name.'.relation_with'));
            $relation_check = (config('relationship.'.$model_name.'.'.$relation_name.'.pivot'));
            $relationship_check = (config('relationship.'.$model_name.'.'.$relation_name.'.check_relation'));
            
            //checking if relation occurs
            if(DB::table($relation_check)
                ->where($field_lower, request()->all($field))
                ->where($relationship_check, $model_id)
                ->count() < 1){
                 //requesting all data
                $val = request()->all($field);
                //relation attach
                $model->$value()->attach($val); 
            }
        });
    }
}
?>