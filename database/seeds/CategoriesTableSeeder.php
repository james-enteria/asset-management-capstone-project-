<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'laptops',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'tablets',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'phones',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'darn food',
                'created_at' => '2019-10-23 10:58:25',
                'updated_at' => '2019-10-23 10:58:25',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'weird crap',
                'created_at' => '2019-10-23 10:58:38',
                'updated_at' => '2019-10-23 10:58:38',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'ball',
                'created_at' => '2019-10-24 09:22:24',
                'updated_at' => '2019-10-24 09:22:24',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'weights',
                'created_at' => '2019-10-24 09:25:11',
                'updated_at' => '2019-10-24 09:25:11',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'frisbee',
                'created_at' => '2019-10-24 09:28:18',
                'updated_at' => '2019-10-24 09:28:18',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'mats',
                'created_at' => '2019-10-24 09:28:41',
                'updated_at' => '2019-10-24 09:28:41',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'Cleaning items',
                'created_at' => '2019-10-24 09:29:38',
                'updated_at' => '2019-10-24 09:29:38',
            ),
        ));
        
        
    }
}