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
                'serialNo' => '#1572104996-0',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:56',
                'updated_at' => '2019-10-26 15:49:56',
                'category_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'serialNo' => '#1572104997-1',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:57',
                'updated_at' => '2019-10-26 15:49:57',
                'category_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'serialNo' => '#1572104997-2',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:57',
                'updated_at' => '2019-10-26 15:49:57',
                'category_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'serialNo' => '#1572104998-3',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'serialNo' => '#1572104998-4',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'serialNo' => '#1572104998-5',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'serialNo' => '#1572104998-6',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'serialNo' => '#1572104998-7',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'serialNo' => '#1572104998-8',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'serialNo' => '#1572104998-9',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'serialNo' => '#1572104998-10',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'serialNo' => '#1572104998-11',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 15:49:58',
                'updated_at' => '2019-10-26 15:49:58',
                'category_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'serialNo' => '#1572107925-12',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 16:38:45',
                'updated_at' => '2019-10-26 16:38:45',
                'category_id' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'serialNo' => '#1572107925-13',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 16:38:45',
                'updated_at' => '2019-10-26 16:38:45',
                'category_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'serialNo' => '#1572107925-14',
                'isAvailable' => 1,
                'created_at' => '2019-10-26 16:38:45',
                'updated_at' => '2019-10-26 16:38:45',
                'category_id' => 2,
            ),
        ));
        
        
    }
}