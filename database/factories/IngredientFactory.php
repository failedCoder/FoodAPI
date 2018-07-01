<?php

use Faker\Generator as Faker;
use App\Language;

$factory->define(App\Ingredient::class, function (Faker $faker) {

	static $counter = 1;
	$locales = Language::pluck('lang');
	$data = array('slug' => 'INGREDIENT-'.$counter);

	 foreach ($locales as $locale) {
	 	$data[$locale] = [
	 		'title' => 'Title for ingredient-' .$counter. ' on '. $locale . ' language'
	 	];
	 }
	 $counter++;
	
	
    return $data;
});
