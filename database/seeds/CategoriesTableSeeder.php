<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'=>'iPhone',
                'slug'=>str_slug('iPhone'),
            ],
            [
                'name'=>'Samsung',
                'slug'=>str_slug('Samsung'),
            ],
            [
                'name'=>'HTC',
                'slug'=>str_slug('HTC'),
            ],
            [
                'name'=>'Huawei',
                'slug'=>str_slug('Huawei'),
            ],
            [
                'name'=>'Oppo',
                'slug'=>str_slug('Oppo'),
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
