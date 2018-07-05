<?php

namespace Filter;

class DiffTimeFilter implements FilterInterface {

	protected $timestamp;

	protected $query;

	public function __construct($timestamp,$query)
	{
		$this->timestamp = $timestamp;

		$this->query = $query;
	}

	public function apply()
	{
		$diffDate = new \DateTime();
		$diffDate->setTimestamp($this->timestamp);

		return $this->query->withTrashed()
				->where('created_at','>',$diffDate)
				->orWhere('updated_at','>',$diffDate)
				->orWhere('deleted_at','>',$diffDate);
	}
	
}