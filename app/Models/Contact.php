<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Trait\HasUuid;

class Contact extends Model
{
    use HasFactory, HasUuid;

    public $table = "contacts";

    protected $fillable = [
        'f_name','phone','email'
    ];

    
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;
}
