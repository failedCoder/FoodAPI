<?php

namespace Filter;

class CategoryFilter implements FilterInterface{

	protected $categoryId;

	protected $query;

	public function __construct($categoryId,$query)
	{
		$this->categoryId = $categoryId;
		$this->query = $query;
	}


	public function apply()
	{

		if ($this->categoryId == (string)(int)$this->categoryId) {

    		return $this->query->where('category_id',$this->categoryId);
    	
    	}elseif ($this->categoryId == 'null') {

    		return $this->query->whereNull('category_id');
    			
    	}elseif ($this->categoryId == '!null') {

    		return $this->query->whereNotNull('category_id');
		}

	}

}

    		