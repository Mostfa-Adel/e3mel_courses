<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'active' => rand(0,1),
            'description' => $this->faker->text,
            'levels' => rand(0,2),
            'views_count'=>$this->faker->numberBetween(0),
            'hours'=>$this->faker->numberBetween(1, 50),
            'category_id'=>$this->faker->numberBetween(1, 20),
        ];
    }
}
