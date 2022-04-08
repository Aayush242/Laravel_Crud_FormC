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

            // dd(request()->all());
            //data of the selected field
            
            $fieldarry = (request()->all());
            $fieldarr = array_keys(request()->all());
            $fieldarr = array_keys($fieldarry['input_request']); 

            $relation_with = array_slice($fieldarr, -2, 1);
            // dd($relation_with);
            // dd($relation_with);
            $field = last($fieldarr);
            $relation_name = trim($relation_with[0], "_id");            
            $field_lower = Str::lower($relation_with[0]);

            // dd($field_lower);
            // dd($field_lower);
            
            //recieve data from config file
            $value = (config('relationship.'.$model_name.'.'.$relation_name.'.relation_with'));
            $relation_check = (config('relationship.'.$model_name.'.'.$relation_name.'.pivot'));
            // dd($relation_with);
            $relationship_check = (config('relationship.'.$model_name.'.'.$relation_name.'.check_relation'));

           if(request()->all($field) != "null"){
                if(DB::table($relation_check)
                ->where($field_lower, request()->all($field))
                ->where($relationship_check, $model_id)
                ){
                    $all_data = request()->all($field);
                    $model->$value()->detach($all_data);

                }
           }

           if(request()->all($relation_with) != "null"){
                //checking if relation occurs
                if(DB::table($relation_check)
                    ->where($field_lower, request()->all($relation_with[0]))
                    ->where($relationship_check, $model_id)
                    ->count() < 1){
                    //requesting all data
                    $val = request()->all($relation_with[0]);
                    //relation attach
                    $model->$value()->attach($val); 
                }
            }
        });
    }
}
?>