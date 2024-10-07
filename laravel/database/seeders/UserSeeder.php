<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        {
            $faker = Faker::create();


            User::factory(10)->create([
                'username' =>$faker->userName(),
                'email'=>$faker->unique()->safeEmail(),
                'phone' =>$faker->phoneNumber(),
                

            ]);
        }
    }
}
