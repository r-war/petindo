<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'index', 'name', 'picture', 'description', 'url',' show'
    ];

    protected $casts =[
        'show' => 'boolean'
    ];
    
}
