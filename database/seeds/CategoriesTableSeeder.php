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
                'id' => 1,
                'name' => 'asdfsdf',
                'description' => 'sadfasd',
                'img_path' => 'images/1572103036.png',
                'isActive' => 1,
                'created_at' => '2019-10-26 15:17:16',
                'updated_at' => '2019-10-26 16:15:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'idk',
                'description' => 'kjk',
                'img_path' => 'images/1572107913.png',
                'isActive' => 1,
                'created_at' => '2019-10-26 16:38:33',
                'updated_at' => '2019-10-26 16:38:33',
            ),
        ));
        
        
    }
}