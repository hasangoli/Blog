<?php

namespace Database\Seeders;

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
                'title' => 'دسته بندی اول',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:39:25',
                'updated_at' => '2022-01-10 17:39:25',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'دسته بندی دوم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:39:34',
                'updated_at' => '2022-01-10 17:39:34',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'دسته بندی سوم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:39:41',
                'updated_at' => '2022-01-10 17:39:41',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'دسته بندی چهارم',
                'user_id' => 1,
                'created_at' => '2022-01-10 17:39:50',
                'updated_at' => '2022-01-10 17:39:50',
            ),
        ));
        
        
    }
}