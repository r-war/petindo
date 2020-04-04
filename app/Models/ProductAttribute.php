<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
    protected $table = 'product_attributes';

    protected $fillable = [
        'product_id','attribute_id', 'value', 'quantity', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributesValues()
    {
        return $this->belongsToMany(AttributeValue::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
