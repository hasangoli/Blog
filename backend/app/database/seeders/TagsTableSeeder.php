<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'تگ اول',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:48:41',
                'updated_at' => '2022-01-10 17:48:41',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'تگ دوم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:48:59',
                'updated_at' => '2022-01-10 17:48:59',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'تگ سوم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:49:06',
                'updated_at' => '2022-01-10 17:49:06',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'تگ چهارم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:49:14',
                'updated_at' => '2022-01-10 17:49:14',
            ),
        ));
        
        
    }
}