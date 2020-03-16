<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 5; $i++){
 
    	      // insert data ke table categories menggunakan Faker
    		DB::table('categories')->insert([
                'name' => $faker->name
    		]);
 
    	}
    }
}
