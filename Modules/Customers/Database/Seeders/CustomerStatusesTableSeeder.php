<?php

namespace Modules\Customers\Database\Seeders;

use Modules\Customers\Entities\CustomerStatuses\CustomerStatus;
use Illuminate\Database\Seeder;

class CustomerStatusesTableSeeder extends Seeder
{
    public function run()
    {
        factory(CustomerStatus::class)->create([
            'status'  => 'Contactado',
            'color' => 'green'
        ]);

        factory(CustomerStatus::class)->create([
            'status'  => 'Sin Decidir',
            'color' => 'yellow'
        ]);

        factory(CustomerStatus::class)->create([
            'status'  => 'Sin Contactar',
            'color' => 'red'
        ]);

        factory(CustomerStatus::class)->create([
            'status'  => 'Sin enviar Información',
            'color' => 'blue'
        ]);

        factory(CustomerStatus::class)->create([
            'status'  => 'Comprometido',
            'color' => 'grey'
        ]);

        factory(CustomerStatus::class)->create([
            'status'  => 'Re Contactar',
            'color' => 'orange'
        ]);
    }
}
