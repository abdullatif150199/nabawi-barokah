<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();
        for ($i = 1; $i <= 5; $i++) {
            $title = fake()->sentence();

            Article::create([
                'user_id' => $user->id,
                'title' => $title,
                'slug' => Str::slug($title),
                'img' => 'default.jpg',
                'content' => collect(fake()->paragraphs(rand(3, 4)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode("\n"),
            ]);
        }
    }
}
