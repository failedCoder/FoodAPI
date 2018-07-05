<?php

namespace Filter;

class TagsFilter implements FilterInterface {

	protected $tagsRaw;

	protected $query;

	public function __construct($tagsRaw,$query)
	{
		$this->tagsRaw = $tagsRaw;
		$this->query = $query;
	}

	public function apply()
	{
		$tags = explode(',', $this->tagsRaw);

		foreach($tags as $tag){

        		$this->query = $this->query->whereHas('tags', function($q) use ($tag) {

            		$q->where('tags.id','=', $tag);

        		});

    	}

    	return $this->query;

	}

}

