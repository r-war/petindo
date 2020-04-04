<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TypiCMS\NestableTrait;

class Category extends Model
{
    use NestableTrait;
    
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'image', 'color'
    ];

    protected $casts = [
        'parent_id'     => 'integer',
        'featured'      => 'boolean',
        'menu'          => 'boolean'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

    public function scopeSearch($query, $params){
        if(isset($params['category']) && $params['category'] != 'all')
        {
            $query->where('slug', $params['category'])
                ->whereHas('products', function($q) use ($params){
                    $q->where('name', 'like', $params['search'].'%');
                })
                ->get();
        }else{
            $query->where('slug', $params['category'])->get();
        }

        return $query;
    }

}
