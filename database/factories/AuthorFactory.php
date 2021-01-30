<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo_url' => $this->faker->imageUrl(300, 300, 'cats'),
            'name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'born' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'biography' => $this->faker->text(1600)
        ];
    }
}