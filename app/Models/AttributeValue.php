<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id', 'name','price',
    ];

    protected $cast = [
        'attribute_id' => 'integer'
    ];

    
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }
}
