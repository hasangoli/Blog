<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 3,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
            1 => 
            array (
                'id' => 2,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 2,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
            2 => 
            array (
                'id' => 3,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 1,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
            3 => 
            array (
                'id' => 4,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 4,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
            4 => 
            array (
                'id' => 5,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 5,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
            5 => 
            array (
                'id' => 6,
                'message' => 'jklfjkldsjkldsjdkl',
                'user_id' => 1,
                'article_id' => 6,
                'created_at' => '2022-01-10 20:40:07',
                'updated_at' => '2022-01-10 20:40:07',
            ),
        ));
        
        
    }
}