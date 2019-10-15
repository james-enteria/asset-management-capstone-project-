<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'requested',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'approved',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'rejected',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'returned',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
        ));
        
        
    }
}