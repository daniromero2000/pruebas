<?php

namespace Modules\Companies\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CompaniesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeePositionsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(DepartmentsEmployeesTableSeeder::class);
    }
}
