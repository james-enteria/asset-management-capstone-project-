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
                'name' => 'Simple Rick\'s wafers',
                'serialNo' => '123asd',
                'description' => 'some pink waffles',
                'img_path' => 'images/1571395878.jpeg',
                'isActive' => 1,
                'created_at' => '2019-10-18 10:51:18',
                'updated_at' => '2019-10-22 11:18:18',
                'category_id' => 3,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Plumbus',
                'serialNo' => 'dasf312',
                'description' => 'all around',
                'img_path' => 'images/1571743393.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-22 11:23:13',
                'updated_at' => '2019-10-22 11:23:13',
                'category_id' => 3,
            ),
        ));
        
        
    }
}