<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'created_at' => '2019-10-15 00:00:00',
                'updated_at' => '2019-10-15 00:00:00',
            ),
        ));
        
        
    }
}