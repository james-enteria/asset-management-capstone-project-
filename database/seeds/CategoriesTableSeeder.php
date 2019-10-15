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
        ));
        
        
    }
}