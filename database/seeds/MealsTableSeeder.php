<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$ingredients = factory(App\Ingredient::class, 10)->create();

    	$tags = factory(App\Tag::class, 5)->create();

        factory(App\Meal::class, 10)->create()->each(function ($meal) use ($ingredients,$tags) { 
    		$meal->ingredients()->saveMany(
    			$ingredients->random(rand(1, 3))
    		);
    		$meal->tags()->saveMany(
    			$tags->random(rand(1, 3))
    		);
    	});
    }
}
