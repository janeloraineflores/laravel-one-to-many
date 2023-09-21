<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Type;

// Helpers
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $types = [
            'Frontend',
            'Backend',
            'PHP',
            'HTML',
            'CSS',
            'JavaScript',
            'ChatGPT',
            'Boolean',
            'Teacher',
            'Studenti',
        ];

        foreach ($types as $title) {
            $slug = str()->slug($title);

            Type::create([
                'title' => $title,
                'slug' => $slug
            ]);
        }
        
      
    }
}