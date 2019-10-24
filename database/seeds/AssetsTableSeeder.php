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
                'id' => 3,
                'name' => 'Basketball',
                'serialNo' => '42069',
                'description' => 'something that bounces',
                'img_path' => 'images/1571908975.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:22:55',
                'updated_at' => '2019-10-24 09:22:55',
                'category_id' => 8,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Volleyball',
                'serialNo' => '69420',
            'description' => 'something that bounces (2)',
                'img_path' => 'images/1571909069.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:24:29',
                'updated_at' => '2019-10-24 09:24:29',
                'category_id' => 8,
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Football',
                'serialNo' => '41968',
            'description' => 'something that bounces(3)',
                'img_path' => 'images/1571909106.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:25:06',
                'updated_at' => '2019-10-24 09:25:06',
                'category_id' => 8,
            ),
            3 => 
            array (
                'id' => 6,
                'name' => '30-lb weight',
                'serialNo' => '666',
                'description' => 'lift to have sick gainz',
                'img_path' => 'images/1571909150.jpeg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:25:50',
                'updated_at' => '2019-10-24 09:25:50',
                'category_id' => 9,
            ),
            4 => 
            array (
                'id' => 7,
                'name' => '10-lb weights',
                'serialNo' => '669',
            'description' => 'lift to have sick gainz (2)',
                'img_path' => 'images/1571909175.jpeg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:26:15',
                'updated_at' => '2019-10-24 09:26:15',
                'category_id' => 9,
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Ultimate Frisbee',
                'serialNo' => '42341',
                'description' => 'returny boi',
                'img_path' => 'images/1571909301.jpeg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:28:21',
                'updated_at' => '2019-10-24 09:28:21',
                'category_id' => 10,
            ),
            6 => 
            array (
                'id' => 9,
            'name' => 'Taekwondo Mats (40pcs)',
                'serialNo' => '21515',
                'description' => 'some hard mats',
                'img_path' => 'images/1571909351.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:29:11',
                'updated_at' => '2019-10-24 09:29:11',
                'category_id' => 11,
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'Pool net',
                'serialNo' => '54asd45',
                'description' => 'cleany pooly boi',
                'img_path' => 'images/1571909397.jpg',
                'isActive' => 1,
                'created_at' => '2019-10-24 09:29:57',
                'updated_at' => '2019-10-24 09:29:57',
                'category_id' => 12,
            ),
        ));
        
        
    }
}