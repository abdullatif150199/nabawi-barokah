<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Testimonial::create([
                'user' => fake()->name(),
                'img' => 'default.jpg', // atau bisa isi default: 'default.jpg'
                'content' => fake()->paragraph(1),
                'rating' => rand(1, 5),
            ]);
        }
    }
}
