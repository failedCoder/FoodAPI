<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(App\Meal::class, function (Faker $faker) {
    
	static $counter = 1;
	$locales = Language::pluck('lang');
	$data = array();

	foreach ($locales as $locale) {
	 	$data[$locale] = [
	 		'title' => 'Title for meal-' .$counter. ' on '. $locale . ' language',
	 		'description' => 'Description for meal-' . $counter . ' on ' . $locale . ' language'
	 	];
	 }
	 $counter++;
	
	
    return $data;
});
