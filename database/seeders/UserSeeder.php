<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        $admins = [];
        for ($i = 0; $i < 1000; $i++) {

            $admins[] = [
                'name' => $faker->name,
            ];

        }
        DB::table('users')->insert($admins);
    }
}
