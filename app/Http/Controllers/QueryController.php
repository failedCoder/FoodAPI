<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MealCollection;
use App\Http\Requests\QueryRequest;
use App\Language;
use App\Meal;
use Filter\CategoryFilter;
use Filter\TagsFilter;
use Filter\WithFilter;
use Filter\DiffTimeFilter;


class QueryController extends Controller
{
    public function index(QueryRequest $request)
    {
    	app()->setLocale($request->query('lang'));

    	$per_page = 5;

    	$query = Meal::query()->withTranslation();


        if ($request->has('category')) {

            $categoryFilter = new CategoryFilter($request->query('category'),$query);

            $query = $categoryFilter->apply();

        }
        
        if ($request->has('tags')) {

            $tagsFilter = new TagsFilter($request->query('tags'),$query);

            $query = $tagsFilter->apply();

        }
    
        if ($request->has('with')) {

            $withFilter = new WithFilter($request->query('with'),$query);

            $query = $withFilter->apply();

        }
        
        if ($request->has('diff_time')) {
            
            $diffTimeFilter = new DiffTimeFilter($request->query('diff_time'),$query);

            $query = $diffTimeFilter->apply();
            
        }

    	
    	if($request->has('per_page')){

    		$per_page = $request->query('per_page');

    	}
   			
    	return new MealCollection($query->paginate($per_page));
    }
}


    
        
        















   //1530718302

        /*if ($request->has('category')) {
            
            $categoryInput = $request->query('category');

            if ($categoryInput == (string)(int)$categoryInput) {

                $query = $query->where('category_id',$categoryInput);
        
            } elseif ($categoryInput == 'null') {

                $query = $query->whereNull('category_id');
                
            } elseif ($categoryInput == '!null') {

                $query = $query->whereNotNull('category_id');
                
            }

        }


        if ($request->has('tags')) {

            $inputTags = $request->query('tags');

            $tags = explode(',', $inputTags);

            foreach($tags as $tag){

                $query = $query->whereHas('tags', function($q) use ($tag) {

                    $q->where('tags.id','=', $tag);

                });

            }

        }

        if ($request->has('with')) {
            
            $withInput = $request->query('with');

            $with = explode(',', $withInput);

            $props = array(
                'ingredients',
                'category',
                'tags'
            );
        
            $list = array_intersect($props, $with);

            $query = $query->with($list);

        }

        
        if ($request->has('diff_time')) {
            
            $diffInput = $request->query('diff_time');

            $diffDate = new \DateTime();
            $diffDate->setTimestamp($diffInput);

            $query = $query->withTrashed()
                ->where('created_at','>',$diffDate)
                ->orWhere('updated_at','>',$diffDate)
                ->orWhere('deleted_at','>',$diffDate);
        }*/