<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	Eloquent::unguard();

    	# Run UserTableSeeder class when Database is seeded
        $this->call(UserTableSeeder::class);

    }
}
