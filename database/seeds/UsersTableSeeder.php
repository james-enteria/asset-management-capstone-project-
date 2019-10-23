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
            2 => 
            array (
                'id' => 3,
                'name' => 'james',
                'email' => 'james@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$q9jfSwm5SFH.vi2rrVBUs.qjZzbttax75CPGFu/CE/eLl.SojwdGi',
                'remember_token' => NULL,
                'created_at' => '2019-10-16 11:07:09',
                'updated_at' => '2019-10-16 11:07:09',
                'role_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'james',
                'email' => 'james@user.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$h8vy87EqPpzvRyy5/MChwufh9ihg.nBBX5BkYGX00fqODq3t28PEe',
                'remember_token' => NULL,
                'created_at' => '2019-10-18 10:01:30',
                'updated_at' => '2019-10-18 10:01:30',
                'role_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'maria',
                'email' => 'maria@user.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9TboenyiYszdfYW5shkx7.Aj0AIZRM8j5ikpwxp8OY3dEFdP9xch.',
                'remember_token' => NULL,
                'created_at' => '2019-10-23 10:30:43',
                'updated_at' => '2019-10-23 10:30:43',
                'role_id' => 2,
            ),
        ));
        
        
    }
}