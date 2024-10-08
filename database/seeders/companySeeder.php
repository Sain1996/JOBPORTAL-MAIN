<?php

namespace Database\Seeders;

use App\Models\companies;
use Illuminate\Database\Seeder;

class companySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            ['name' => 'Bosch'],
            ['name' => 'Amazon'],
            ['name' => 'IBM'],
            ['name' => 'Accenture'],
            ['name' => 'IBS'],
            ['name' => 'Quest Global'],
            ['name' => 'AyTech'],
            ['name' => 'Infosys'],
            // Add more companies here...
        ];

        foreach ($companies as $company) {
            companies::create($company);
        }
    }
}
