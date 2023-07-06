<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\contact;
use Faker\Factory as faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $data = new contact();
            $data->name = $faker->name;
            $data->email = $faker->email;
            $data->phone = rand(1000000000,9999999999);
            $data->message = $faker->text;
            $data->save();
        }
    }
}
