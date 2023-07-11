<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department_array=array("Finance", "Marketing", "Audit", "Sales");
        for ($i=1; $i<=4; $i++) {
            $department = new Department();
            $department->name = $department_array[$i-1];
            $department->save();
        }
    }
}
