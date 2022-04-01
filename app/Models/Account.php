<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Trait\HasUuid;
use App\Trait\Relation;

class Account extends Model
{
    use HasFactory, HasUuid, Relation;

    public $table = "accounts";

    protected $fillable = [
        'f_name','l_name','dob','phone','email','address','hobby','gender','country'
    ];

    public function sethobbyattribute($value){
        $this->attributes['hobby']=implode(',' , $value);
    }

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;
/**
         * The roles that belong to the Account
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function contacts()
        {
            return $this->belongsToMany(Contact::class);
        }

}

