<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Baby Mateo Santos',
                'purok' => 'Purok Rosal',
                'vaccine' => 'BCG',
                'dose' => 'At birth',
                'scheduled_at' => '2026-01-14',
                'status' => 'Done',
            ],
            [
                'patient_name' => 'Lolo Ramon Bautista',
                'purok' => 'Purok Sampaguita',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual',
                'scheduled_at' => '2026-10-15',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Baby Althea Mendoza',
                'purok' => 'Purok Mangga',
                'vaccine' => 'Pentavalent',
                'dose' => '2nd dose',
                'scheduled_at' => '2026-03-20',
                'status' => 'Done',
            ],
            [
                'patient_name' => 'Baby Lucas Villanueva',
                'purok' => 'Purok Riverside',
                'vaccine' => 'OPV',
                'dose' => '3rd dose',
                'scheduled_at' => '2026-05-12',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Baby Sophia Garcia',
                'purok' => 'Purok Centro',
                'vaccine' => 'MMR',
                'dose' => '1st dose',
                'scheduled_at' => '2026-09-08',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Nanay Corazon Ramos',
                'purok' => 'Purok Kawayan',
                'vaccine' => 'Pneumococcal', // Chosen additional vaccine
                'dose' => 'Booster',
                'scheduled_at' => '2026-11-28',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Gabriel Mercado',
                'purok' => 'Purok Ilang-Ilang',
                'vaccine' => 'Hepatitis B',
                'dose' => 'Booster',
                'scheduled_at' => '2026-11-16',
                'status' => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
