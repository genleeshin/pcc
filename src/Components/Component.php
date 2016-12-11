<?php 

namespace PCC\Components;

use PCC\Collection;

class Component{

	use \PCC\Traits\TraitAttributes;

	protected $data = [];

	protected $data_keys = ['name'];

	public function __construct($data=null, $attributes=null){

		$this->setDataKeys();

		if(is_array($attributes)){

			if(isset($attributes['attributes'])){
				$this->setTagAttributes($attributes['attributes']);
				unset($attributes['attributes']);
			}

			$this->setAttributes($attributes);

		}elseif(is_closure($attributes)){

			$attributes($this);

		}

		if($data)
			$this->setCollections($data);
	}

	public function setDataKeys($data_keys = null)
	{
		$data_keys = $data_keys ?: $this->data_keys;

		foreach($data_keys as $key=>$value)
			if(is_string($key))
				$this->$key = $value;
			else
				$this->$value = $value;	
	}

	public function getDataKeys()
	{
	
		return $this->data_keys;
	
	}

	public function setCollections($data)
	{
	
		foreach($data as $d)
			$this->setCollection($d);
	
	}

	public function setCollection($data)
	{
	
		$collection = new Collection($this, $data);

		$this->data[] = $collection;
	
	}

	public function getData()
	{
	
		return $this->data;
	
	}

	public function __call($method, $args)
	{
	
		$arr = preg_split('/(?=[A-Z])/',$method);

		$method = $arr[0] . end($arr);

		array_shift($arr);

		array_pop($arr);

		$name = strtolower(implode('_', $arr));

		$this->$method($name, $args[0]);
	
	}

}