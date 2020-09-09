<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'gambar' => $faker->image('public/storage/images',640,480, null, false),
        'judul' => $faker->sentence,
        'nama' => $faker->word,
        'description' => $faker->paragraph,
    ];
});
