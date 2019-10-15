<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xWL5v8sHiA33rintomhGnOD/.4XmDBXHs7QyisKrGiT.5I2PYDvyq',
                'remember_token' => NULL,
                'created_at' => '2019-10-15 12:34:35',
                'updated_at' => '2019-10-15 12:34:35',
                'role_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ben',
                'email' => 'ben@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0Ue767caWY2JOYDcd96dqOSu5vw4Z5yyP3dnfdv.JXUPyUukh5O56',
                'remember_token' => NULL,
                'created_at' => '2019-10-15 12:34:58',
                'updated_at' => '2019-10-15 12:34:58',
                'role_id' => 2,
            ),
        ));
        
        
    }
}