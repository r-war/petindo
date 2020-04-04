<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'index', 'name', 'url', 'active'
    ];

    protected $casts = [
        'parent_id'     => 'integer',
        'active'      => 'boolean',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    
}
