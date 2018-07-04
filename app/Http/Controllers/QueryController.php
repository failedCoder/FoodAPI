<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MealCollection;
use App\Http\Requests\QueryRequest;
use App\Language;
use App\Meal;

//TO DO:
/*-FORMATIRAJ RESPONSE
*/
class QueryController extends Controller
{
    public function index(QueryRequest $request)
    {
    	app()->setLocale($request->query('lang'));

    	$per_page = 5;

    	$query = Meal::query()->withTranslation();

    	//where nulll
		if ($request->has('category')) {
    		
    		$categoryInput = $request->query('category');

    		if ($categoryInput == (string)(int)$categoryInput) {

    			$query = $query->where('category_id',$categoryInput);
    	
    		}elseif ($categoryInput == 'null') {

    			$query = $query->where('category_id',null);
    			
    		}elseif ($categoryInput == '!null') {

    			$query = $query->where('category_id','<>',null);
    			
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
    	//1530718302
    	if ($request->has('diff_time')) {
    		
    		$diffInput = $request->query('diff_time');

    		$diffDate = new \DateTime();
			$diffDate->setTimestamp($diffInput);

			$query = $query->withTrashed()
				->where('created_at','>',$diffDate)
				->orWhere('updated_at','>',$diffDate)
				->orWhere('deleted_at','>',$diffDate);
    	}

    	if($request->has('per_page')){

    		$per_page = $request->query('per_page');

    	}
   		
    	
    	return new MealCollection($query->paginate($per_page));
    }
}
