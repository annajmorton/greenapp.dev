<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('surveys')->insert([
	        'survey_question' => "send me more information"
        ]);
        DB::table('surveys')->insert([
	        'survey_question' => "i want to be a beta tester"
        ]);
    }
}
