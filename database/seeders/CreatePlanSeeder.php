<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::updateOrCreate(
            [
                'type' => 'Standard'
            ],
            [
                'type'   => 'Standard',
                'price'  => 10,
                'period' => 'Week'
            ]
        );

        Plan::updateOrCreate(
            [
                'type' => 'Professional'
            ],
            [
                'type'   => 'Professional',
                'price'  => 25,
                'period' => 'Month'
            ]
        );

        Plan::updateOrCreate(
            [
                'type' => 'Enterprise'
            ],
            [
                'type'   => 'Enterprise',
                'price'  => 100,
                'period' => 'Year'
            ]
        );
    }
}
