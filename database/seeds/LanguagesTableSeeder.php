<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!App\Language::count()) {
        	
    		$defaultLanguages = array('hr','en','de');

        	foreach ($defaultLanguages as $language) {
	        	App\Language::create([
	        		'lang' => $language
	        	]);
            }
    	}
    }
}
