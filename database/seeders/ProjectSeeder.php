<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i = 0; $i < 30; $i++) {
            $title = substr(fake()->sentence(), 0, 255);
            $slug = str()->slug($title);
            $content = fake()->paragraph();

            $randomCategoryId = null;
            if (fake()->boolean()) {
                $randomTypeId = Type::inRandomOrder()->first()->id;
            }

            Project::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'category_id' => $randomTypeId
            ]);
        }
    }
}