<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin Nabawi',
            'email' => 'nabawi@gmail.com',
            'password' => Hash::make('nabawi@2025'),
        ]);

        // $this->call(VisitorSeeder::class);
        // $this->call(ArticleSeeder::class);
        // $this->call(DocumentationSeeder::class);
        // $this->call(ApplicantSeeder::class);
        // $this->call(TestimonialSeeder::class);
    }
}
