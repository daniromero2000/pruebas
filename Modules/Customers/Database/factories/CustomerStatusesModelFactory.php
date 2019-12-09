<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Customers\Entities\CustomerStatuses\CustomerStatus;

$factory->define(CustomerStatus::class, function (Faker\Generator $faker) {

    return [
        'status'  => $faker->word,
        'color' => $faker->hexColor
    ];
});
