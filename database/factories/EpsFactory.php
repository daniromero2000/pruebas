<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Generals\Epss\Eps;
use Faker\Generator as Faker;

$factory->define(Eps::class, function () {
    return [
        'eps' => 'Sura'
    ];
});
