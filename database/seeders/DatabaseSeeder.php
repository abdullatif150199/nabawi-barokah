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

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        // ]);

        // $this->call(VisitorSeeder::class);
        // $this->call(ArticleSeeder::class);
        // $this->call(DocumentationSeeder::class);
        // $this->call(ApplicantSeeder::class);
        $this->call(TestimonialSeeder::class);
    }
}
