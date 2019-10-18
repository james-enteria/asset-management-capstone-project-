<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assets')->delete();
        
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Simple',
                'serialNo' => '123asd',
                'description' => 'some pink waffles',
                'img_path' => 'images/1571395878.jpeg',
                'isActive' => 1,
                'created_at' => '2019-10-18 10:51:18',
                'updated_at' => '2019-10-18 11:14:30',
                'category_id' => 3,
            ),
        ));
        
        
    }
}