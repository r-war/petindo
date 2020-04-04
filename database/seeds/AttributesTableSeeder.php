<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code'          => 'size',
            'name'          => 'size',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required'   => 1,
        ]);

        Attribute::create([
            'code'          => 'color',
            'name'          => 'color',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required'   => 1,
        ]);
    }
}
