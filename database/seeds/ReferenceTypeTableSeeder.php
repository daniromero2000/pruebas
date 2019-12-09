<?php

use App\Entities\Generals\ReferenceTypes\ReferenceType;
use Illuminate\Database\Seeder;

class ReferenceTypeTableSeeder extends Seeder
{
    public function run()
    {
        factory(ReferenceType::class)->create([
            'reference_type'  => 'Familiar',
        ]);

        factory(ReferenceType::class)->create([
            'reference_type'  => 'Personal',
        ]);

        factory(ReferenceType::class)->create([
            'reference_type'  => 'Codeudor',
        ]);

        factory(ReferenceType::class)->create([
            'reference_type'  => 'Otro',
        ]);
    }
}
