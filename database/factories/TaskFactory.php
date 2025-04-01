<?php

// database/factories/TaskFactory.php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,  // Generate a random task title
            'category_id' => Category::inRandomOrder()->first()->id,  // Assign a random category
        ];
    }
}

