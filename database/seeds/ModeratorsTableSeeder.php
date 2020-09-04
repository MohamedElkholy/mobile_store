<?php

use Illuminate\Database\Seeder;

class ModeratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moderators')->insert([
            'name' => 'admin name',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
