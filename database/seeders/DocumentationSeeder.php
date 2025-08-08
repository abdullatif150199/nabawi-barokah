<?php

namespace Database\Seeders;

use App\Models\Documentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $title = fake()->sentence(3);

            Documentation::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => collect(fake()->paragraphs(rand(2, 4)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode("\n"),
                'img_thumb' => 'default_thumb.jpg',
            ]);
        }
    }
}
