<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

    ];
});

$factory->define(\App\Forum::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'description' => $faker->text(40),
        'user_id' => random_int(1,10),
    ];
});

$factory->define(\App\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'content' => $faker->text(500),
        'user_id' => random_int(1,10),
        'forum_id' => random_int(32,41),
    ];
});

$factory->define(\App\Reply::class, function (Faker $faker) {
    return [
        'content' => $faker->text(400),
        'user_id' => random_int(1,10),
        'thread_id' => random_int(1,20),
    ];
});