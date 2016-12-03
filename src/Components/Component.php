<?php 

namespace PCC\Components;

use PCC\Collection;

class Component{

	use \PCC\Traits\TraitAttributes;

	protected $collections = [];

	public function __construct($data=null, $attributes=null){

		if(is_array($attributes))
			$this->setAttributes($attributes);
		elseif(is_closure($attributes))
			$attributes($this);
		if($data)
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