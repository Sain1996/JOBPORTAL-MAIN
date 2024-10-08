<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\job_post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        job_post::insert([
            [
                'title' => "Automation Test engineer -SDET",
                "years_of_experience" => 2,
                "salary" => 55000,
                "qualification" => "Any Graduate",
                "technology" => " Selenium, Java, Rest Assured",
                "description" => "Quality Assurance and Testing",
                "work_mode" => "Remote",
                "post_date" => Carbon::now()->format('Y-m-d H:i:s'),
                "status" => "open",
                "company" => "Cognizant",
                "email" => "test@gmail.com",
                "phone" => "08945632",
                "country_code" => "+91",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


        ]);
    }
}
