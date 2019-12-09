<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenreTableSeeder::class);
        $this->call(CivilStatusTableSeeder::class);
        $this->call(EconomicActivityTypesTableSeeder::class);
        $this->call(IdentityTypeTableSeeder::class);
        $this->call(ProfessionsGroupsTableSeeder::class);
        $this->call(ProfessionsListTableSeeder::class);
        $this->call(ReferenceTypeTableSeeder::class);
        $this->call(HousingTableSeeder::class);
        $this->call(RelationshipTableSeeder::class);
        $this->call(ScholarityTableSeeder::class);
        $this->call(StratumsTableSeeder::class);
        $this->call(VehicleBrandTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(MyCountryTableSeeder::class);
        $this->call(MyProvincesTableSeeder::class);
        $this->call(MyCitiesTableSeeder::class);
        $this->call(EpsTableSeeder::class);
    }
}
