<?php

namespace Database\Factories;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(App\Models\Materia::class, function (Faker $faker) {
            return [
                'titulo' => $faker->sentence,
                'descricao' => $faker->paragraph,
                'texto_completo' => $faker->text,
                'imagem' => $faker->imageUrl(),
                'data_de_publicacao' => $faker->dateTimeThisMonth,
            ];
        });
    }
}