<?php

use Faker\Generator as Faker;
use App\Language;
use App\Category;

$factory->define(App\Meal::class, function (Faker $faker) {
    
	static $counter = 1;
	$locales = Language::pluck('lang');
	$categories = Category::all();
	$category = $categories->random(rand(0, 1))->first();

	$data = array(
		'category_id' => $category ? $category->id : $category);

	foreach ($locales as $locale) {
	 	$data[$locale] = [
	 		'title' => 'Title for meal-' .$counter. ' on '. $locale . ' language',
	 		'description' => 'Description for meal-' . $counter . ' on ' . $locale . ' language'
	 	];
	 }
	 $counter++;
	
	
    return $data;
});
