<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(App\Category::class, function (Faker $faker) {

	 static $counter = 1;
	 $locales = Language::pluck('lang');
	 $data = array('slug' => 'CATEGORY-'.$counter);

	 foreach ($locales as $locale) {
	 	$data[$locale] = [
	 		'title' => 'Title for category-' .$counter. ' on '. $locale . ' language'
	 	];
	 }
	 $counter++;
	
	
    return $data;
});
