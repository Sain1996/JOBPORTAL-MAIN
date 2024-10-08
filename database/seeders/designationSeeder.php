<?php

namespace Database\Seeders;

use App\Models\designation;
use Illuminate\Database\Seeder;

class designationSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            ['designation' => 'Software Engineer'],
            ['designation' => 'Senior Software Engineer'],
            ['designation' => 'Team Lead'],
            ['designation' => 'Project Manager'],
            ['designation' => 'Software Architect'],
            ['designation' => 'Software Developer'],
            ['designation' => 'Software Tester'],
            ['designation' => 'QA Lead'],
            ['designation' => 'Business Analyst'],
            // Add more designations here...
        ];

        foreach ($designations as $designation) {
            designation::create($designation);
        }
    }
}
