<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(rand(2, 3)), "."),
            'slug' => rtrim($this->faker->sentence(rand(2, 3)), "."),
            'body' => $this->faker->paragraphs(rand(3,7), true),
            'views' => rand(0, 10),
            'answers' => rand(0, 10),
            'votes' => rand(-3, 10)
        ];
    }
}
