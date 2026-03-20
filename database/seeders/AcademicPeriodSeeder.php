<?php

namespace Database\Seeders;

use App\Models\AcademicPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            [
                'name' => '2025-I',
                'start_date' => '2025-01-10',
                'end_date' => '2025-05-30',
                'status' => 'closed'
            ],
            [
                'name' => '2025-II',
                'start_date' => '2025-07-01',
                'end_date' => '2025-11-20',
                'status' => 'closed'
            ],
            [
                'name' => '2026-I',
                'start_date' => '2026-01-15',
                'end_date' => '2026-05-30',
                'status' => 'active'
            ],
        ];

        foreach ($periods as $period) {
            AcademicPeriod::create($period);
        }
    }
}
