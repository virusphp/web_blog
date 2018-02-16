<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SuggestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = faker::create();
      for ($i=0; $i < 20 ; $i++) {
        DB::table('suggests')->insert([
          'name' => $faker->name
        ]);
      }
  }
}
