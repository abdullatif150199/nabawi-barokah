<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         foreach (range(1, 10) as $i) {
            Applicant::create([
                'package_id' => rand(1, 3),
                'name' => 'Pemohon ' . $i,
                'wa' => '08123456789' . $i,
                'message' => 'Pesan dari pemohon ' . $i,
            ]);
        }
    }
}
