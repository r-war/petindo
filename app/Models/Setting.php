<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Setting extends Model
{
    //
    protected $table = 'settings';

    protected $fillable = ['key', 'value'];

    /**
     * @param $key
     */
    public static function get($key)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->first();
        if (!$entry) {
            return;
        }
        return $entry->value;
    }

    /**
     * @param $key
     * @param null $value
     * @return bool
     */
    public static function set($key, $value = null)
    {
        $setting = new self();
        // $entry = $setting->where('key', $key)->firstOrFail();
        // $entry->value = $value;
        // $entry->saveOrFail();
        $entry = $setting->updateOrCreate(['key' => $key], ['value' => $value]);
        
        //dd($key);
        Config::set('key', $value);
        if (Config::get($key) == $value) {
            return true;
        }
        return false;
    }


}
