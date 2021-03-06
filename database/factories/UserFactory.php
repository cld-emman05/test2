<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Orders::class, function (Faker $faker) {
    static $password;

    return [
        'id' => $faker->ean8,
        'customer_id' => function(){
          return factory(App\User::class)->create()->id;
        },
        'sales_agent_id' => $faker->ean8,
        'quantity' => $faker->ean8,
        'size_type_id' => $faker->ean8,
        'page_count' => $faker->ean8,
        'binding_type_id' => $faker->ean8,
        'paper_type_id' => $faker->ean8
    ];
});


$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'id' => 2,
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret')
    ];
});


$factory->define(App\Quotations::class, function (Faker $faker) {
    static $password;

    return [
        'id' => 1,
        'order_id' => $faker->ean8,
        'amount_quoted' => $faker->ean8,
        'date_submitted' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'date_approved' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'date_rejected' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'comments' => $faker->text,
        'paper_type_id' => $faker->ean8,
        'offset_type_id' => $faker->ean8,
        'lamination_type_id' => $faker->ean8,
        'binding_type_id' => $faker->ean8,
        'diecutting_type_id' => $faker->ean8
    ];
});
