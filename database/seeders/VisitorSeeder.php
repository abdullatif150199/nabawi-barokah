<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ];
        }


        $chunks = array_chunk($data, 200);

        foreach ($chunks as $chunk) {
            Visitor::insert($chunk);
        }
    }
}
