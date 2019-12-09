<?php

use App\Entities\Generals\Scholarities\Scholarity;
use Illuminate\Database\Seeder;

class ScholarityTableSeeder extends Seeder
{
    public function run()
    {
        factory(Scholarity::class)->create([
            'scholarity'  => 'Inicial',
        ]);

        factory(Scholarity::class)->create([
            'scholarity'  => 'Preescolar',
        ]);

        factory(Scholarity::class)->create([
            'scholarity'  => 'Básica Primaria',
        ]);

        factory(Scholarity::class)->create([
            'scholarity'  => 'Básica Secundaria',
        ]);

        factory(Scholarity::class)->create([
            'scholarity'  => 'Media',
        ]);

        factory(Scholarity::class)->create([
            'scholarity'  => 'Superior',
        ]);
    }
}
