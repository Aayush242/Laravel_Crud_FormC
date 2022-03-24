<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Trait\HasUuid;

class Project extends Model
{
    use HasFactory, HasUuid;

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
