<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $table = 'attributes';

    protected $fillable =  [
        'code','name','frontend_type','is_filterable','is_required'
    ];

    protected $cast = [
        'is_filterable' => 'boolean',
        'is_required' => 'boolean',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

}
