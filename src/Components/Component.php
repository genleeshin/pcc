<?php 

namespace PCC\Components;

use PCC\Collection;

class Component{

	use \PCC\Traits\TraitAttributes;

	protected $collections = [];

	public function __construct($data, $attributes){

		if(is_array($attributes))
			$this->setAttributes($attributes);
		else
			$attributes($this);

		$this->setCollections($data);
	}

	public function setCollections($data)
	{
	
		foreach($data as $d)
			$this->setCollection($d);
	
	}

	public function setCollection($data)
	{
	
		$collection = new Collection($this, $data);

		$this->collections[] = $collection;
	
	}
}