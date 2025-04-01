<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Categories
        \App\Models\category::factory(5)->create();  // Create 5 categories

        // Seed Tasks
        \App\Models\Task::factory(10)->create();  // Create 10 tasks
    }
}

