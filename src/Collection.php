<?php 

namespace PCC;

class Collection{

	use \PCC\Traits\TraitAttributes;

	protected $callback;

	protected $map_attributes = [];

	protected $data;

	public function __construct($callback, $data)
	{
	
		$this->callback = $callback;

		$this->data = $data;

		$this->setValues();
	
	}

	public function setValues()
	{
		$this->map_attributes = $this->callback->getFlippedAttributes();

		foreach($this->data as $key => $value)
			$this->setValue($key, $value);
	
	}

	public function setValue($key, $value)
	{
		//$this->w('key: ' . $key);

		$data_key = array_key_exists($key, $this->map_attributes)?$this->map_attributes[$key]:$key;

		//$this->w('data_key: ' . $data_key);

		$this->$data_key = $value;
	
	}

}