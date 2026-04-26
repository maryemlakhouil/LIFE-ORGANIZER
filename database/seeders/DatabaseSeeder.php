<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@familyorganizer.test'],
            [
                'name' => 'Admin Principal',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $parent = User::updateOrCreate(
            ['email' => 'parent@familyorganizer.test'],
            [
                'name' => 'Fatima Belissaoui',
                'password' => Hash::make('password123'),
                'role' => 'parent',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password123'),
                'role' => 'parent',
                'is_active' => true,
            ]
        );

        $nannies = [
            [
                'name' => 'Sofia Amrani',
                'email' => 'sofia.nounou@test.com',
                'is_active' => true,
                'experience_years' => 8,
                'hourly_rate' => 15,
            ],
            [
                'name' => 'Meryem Alaoui',
                'email' => 'meryem.nounou@test.com',
                'is_active' => true,
                'experience_years' => 3,
                'hourly_rate' => 12,
            ],
            [
                'name' => 'Imane Tazi',
                'email' => 'imane.nounou@test.com',
                'is_active' => true,
                'experience_years' => 10,
                'hourly_rate' => 18,
            ],
            [
                'name' => 'Salma Bennani',
                'email' => 'salma.nounou@test.com',
                'is_active' => true,
                'experience_years' => 5,
                'hourly_rate' => 14,
            ],
            [
                'name' => 'Khadija Idrissi',
                'email' => 'khadija.nounou@test.com',
                'is_active' => false,
                'experience_years' => 6,
                'hourly_rate' => 16,
            ],
        ];

        $createdNannies = [];

        foreach ($nannies as $nannyData) {
            $createdNannies[] = User::updateOrCreate(
                ['email' => $nannyData['email']],
                [
                    'name' => $nannyData['name'],
                    'password' => Hash::make('password123'),
                    'role' => 'nounou',
                    'is_active' => $nannyData['is_active'],
                    'experience_years' => $nannyData['experience_years'],
                    'hourly_rate' => $nannyData['hourly_rate'],
                ]
            );
        }

        $familyOne = Family::updateOrCreate(
            ['name' => 'Famille Belissaoui'],
            ['created_by' => $parent->id]
        );

        $familyTwo = Family::updateOrCreate(
            ['name' => 'Famille Andaloussi'],
            ['created_by' => $parent->id]
        );

        $familyOne->users()->syncWithoutDetaching([
            $parent->id,
            $createdNannies[0]->id,
            $createdNannies[1]->id,
            $createdNannies[2]->id,
        ]);

        $familyTwo->users()->syncWithoutDetaching([
            $parent->id,
            $createdNannies[2]->id,
            $createdNannies[3]->id,
            $createdNannies[4]->id,
        ]);
    }
}
