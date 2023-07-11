<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
Use Faker\Factory as faker;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= faker::create();
        $gender_array = array("male", "female");
        for ($i=1; $i<=20; $i++) {
            $employee = new Employee();
            $employee->name = $faker->name;
            $employee->email = $faker->email;
            $employee->password = $faker->password;
            $employee->phone = rand(1000000000,9999999999);
            $employee->gender = $gender_array[rand(0,1)];
            $employee->address = $faker->address;
            $employee->department_id = rand(1,4);
            $employee->salary = rand(10000,99999);
            $employee->save();
        }
    }
}
