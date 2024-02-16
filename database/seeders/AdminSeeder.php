<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
        for ($i = 0; $i < 100; $i++) {

            $admins[] = [
                'name' => $faker->name,
            ];

        }
        DB::table('admins')->insert($admins);
    }
}
