<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'مقاله اول',
                'slug' => 'مقاله-اول',
                'image' => '1641837661-61dc745d0c7d6.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 9,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:01:01',
                'updated_at' => '2022-01-10 18:01:01',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'مقاله چهارم',
                'slug' => 'مقاله-اول',
                'image' => '1641839089-61dc79f1652eb.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:01:45',
                'updated_at' => '2022-01-10 18:24:49',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'مقاله اول',
                'slug' => 'مقاله-اول',
                'image' => '1641837745-61dc74b134f2d.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:02:25',
                'updated_at' => '2022-01-10 18:02:25',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'مقاله دوم',
                'slug' => 'مقاله-دوم',
                'image' => '1641837802-61dc74eac44a2.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:03:22',
                'updated_at' => '2022-01-10 18:03:22',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'مقاله سوم',
                'slug' => 'مقاله-سوم',
                'image' => '1641837824-61dc75004df7c.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 3,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:03:44',
                'updated_at' => '2022-01-10 18:03:44',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'مقاله چهارم',
                'slug' => 'مقاله-چهارم',
                'image' => '1641837858-61dc7522494bc.png',
                'description' => 'تبمیتتتمنتم',
                'content' => 'تبنیمستنمدیستنذبتیان',
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => '2022-01-10 18:04:18',
                'updated_at' => '2022-01-10 18:04:18',
            ),
        ));
        
        
    }
}