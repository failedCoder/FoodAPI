<?php

namespace Filter;

class WithFilter implements FilterInterface {

	protected $withInput;

	protected $query;

	public function __construct($withInput,$query)
	{
		$this->withInput = $withInput;

		$this->query = $query;
	}

	public function apply()
	{
		$with = explode(',', $this->withInput);

    		$props = array(
				'ingredients',
				'category',
				'tags'
			);
		
			$list = array_intersect($props, $with);

			return $this->query->with($list);
	}
}