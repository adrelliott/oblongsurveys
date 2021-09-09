<?php

namespace Database\Factories\Surveys;

use App\Models\Surveys\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Survey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(8),
            'title' => $this->faker->sentence(2),
            'intro_page' => $this->faker->realText(),
        ];
    }
}
