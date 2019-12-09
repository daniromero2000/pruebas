<?php

namespace Modules\Customers\Database\Seeders;

use Modules\Customers\Entities\CustomerLeads\CustomerLead;
use Illuminate\Database\Seeder;

class CustomerLeadTableSeeder extends Seeder
{
    public function run()
    {
        factory(CustomerLead::class)->create([
            'lead'  => 'Facebook',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Whatsapp',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Telemercadeo',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Recontactado',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Almacén',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Buscado',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Adds',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Agencia',
        ]);

        factory(CustomerLead::class)->create([
            'lead'  => 'Referencia',
        ]);
    }
}
