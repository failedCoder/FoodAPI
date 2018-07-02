<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\QueryRequest;
use App\Category;
use App\Language;

class QueryController extends Controller
{
    public function index(QueryRequest $request)
    {
    	app()->setLocale($request->query('lang'));
   		
    	return 'test';
    }
}
