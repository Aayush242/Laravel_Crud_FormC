<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Trait\HasUuid;
use App\Trait\Relation;

class Project extends Model
{
    use HasFactory, HasUuid, Relation;

    public $table = "projects";

    protected $fillable = [
        'f_name','email','as_date','deadline'
    ];

    
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public function contacts()
        {
            return $this->belongsToMany(Contact::class);
        }
    

}
