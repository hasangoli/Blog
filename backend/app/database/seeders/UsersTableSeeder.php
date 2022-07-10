<?php

namespace Database\Seeders;

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
                'name' => 'test',
                'lastName' => 'test',
                'email' => 'user@user.com',
                'phone' => NULL,
                'password' => '$2y$10$d8xH7VB7XI.DyujPFCwAZey6/esodAfS0XYfR9s5AsdWPXRHqUxOi',
                'remember_token' => NULL,
                'created_at' => '2022-01-10 17:37:33',
                'updated_at' => '2022-01-10 17:37:33',
            ),
        ));
        
        
    }
}