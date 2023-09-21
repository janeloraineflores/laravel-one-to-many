<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::truncate();

        for ($i = 0; $i < 10 ; $i++) { 
            $title = substr(fake()->word(), 0, 255);
            $slug => str()->slug($title);
            
            Type::create([
                'title ' => $title,
                'slug' => $slug
            ]);
        }
    }
}
