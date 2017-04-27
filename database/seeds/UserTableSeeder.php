<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample users 
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'yacali',
            'password' => Hash::make('Yacub1993Ali')
        ));
 
        User::create(array(
            'username' => 'jamal',
            'password' => Hash::make('jamal123')
        ));
    }
}
