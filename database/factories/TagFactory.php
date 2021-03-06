<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(App\Tag::class, function (Faker $faker) {
    
	static $counter = 1;
	$locales = Language::pluck('lang');
	$data = array('slug' => 'TAG-'.$counter);

	foreach ($locales as $locale) {
	 	$data[$locale] = [
	 		'title' => 'Title for tag-' .$counter. ' on '. $locale . ' language'
	 	];
	 }
	 $counter++;
	
	
    return $data;
});
