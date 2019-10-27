<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'refNo' => '6-asdfsdf-2019-10-28-2019-10-31',
                'user_id' => 6,
                'status_id' => 2,
                'category_id' => 1,
                'asset_id' => 1,
                'borrowDate' => '2019-10-28 00:00:00',
                'returnDate' => '2019-10-27 05:29:08',
                'created_at' => '2019-10-26 16:28:47',
                'updated_at' => '2019-10-27 05:29:08',
            ),
            1 => 
            array (
                'id' => 3,
                'refNo' => '6-idk-2019-10-30-2019-10-31',
                'user_id' => 6,
                'status_id' => 2,
                'category_id' => 2,
                'asset_id' => 13,
                'borrowDate' => '2019-10-30 00:00:00',
                'returnDate' => '2019-10-27 06:42:27',
                'created_at' => '2019-10-26 16:39:38',
                'updated_at' => '2019-10-27 06:42:27',
            ),
            2 => 
            array (
                'id' => 4,
                'refNo' => '5-idk-2019-10-27-2019-10-28',
                'user_id' => 5,
                'status_id' => 1,
                'category_id' => 2,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-27 00:00:00',
                'returnDate' => '2019-10-28 00:00:00',
                'created_at' => '2019-10-27 09:48:33',
                'updated_at' => '2019-10-27 09:48:33',
            ),
            3 => 
            array (
                'id' => 5,
                'refNo' => '5-idk-2019-10-27-2019-10-29',
                'user_id' => 5,
                'status_id' => 1,
                'category_id' => 2,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-27 00:00:00',
                'returnDate' => '2019-10-29 00:00:00',
                'created_at' => '2019-10-27 10:01:01',
                'updated_at' => '2019-10-27 10:01:01',
            ),
            4 => 
            array (
                'id' => 6,
                'refNo' => '5-idk-2019-10-28-2019-10-28',
                'user_id' => 5,
                'status_id' => 1,
                'category_id' => 2,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-28 00:00:00',
                'returnDate' => '2019-10-28 00:00:00',
                'created_at' => '2019-10-27 10:01:45',
                'updated_at' => '2019-10-27 10:01:45',
            ),
            5 => 
            array (
                'id' => 10,
                'refNo' => '5-idk-2019-10-30-2019-10-31',
                'user_id' => 5,
                'status_id' => 1,
                'category_id' => 2,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-30 00:00:00',
                'returnDate' => '2019-10-31 00:00:00',
                'created_at' => '2019-10-27 10:26:42',
                'updated_at' => '2019-10-27 10:26:42',
            ),
            6 => 
            array (
                'id' => 11,
                'refNo' => '5-asdfsdf-2019-10-27-2019-10-28',
                'user_id' => 5,
                'status_id' => 1,
                'category_id' => 1,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-27 00:00:00',
                'returnDate' => '2019-10-28 00:00:00',
                'created_at' => '2019-10-27 10:28:51',
                'updated_at' => '2019-10-27 10:28:51',
            ),
            7 => 
            array (
                'id' => 12,
                'refNo' => '4-asdfsdf-2019-10-28-2019-10-29',
                'user_id' => 4,
                'status_id' => 1,
                'category_id' => 1,
                'asset_id' => NULL,
                'borrowDate' => '2019-10-28 00:00:00',
                'returnDate' => '2019-10-29 00:00:00',
                'created_at' => '2019-10-27 10:30:24',
                'updated_at' => '2019-10-27 10:30:24',
            ),
        ));
        
        
    }
}