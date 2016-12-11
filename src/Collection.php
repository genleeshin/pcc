<?php 

namespace PCC;

class Collection{

	use \PCC\Traits\TraitAttributes;

	protected $callback;

	protected $map_attributes = [];

	protected $data;

	public function __construct($callback, $data)
	{

		//dd($data->url);
	
		$this->callback = $callback;

		$this->data = $data;

		$this->setValues();
	
	}

	public function setValues()
	{
		$this->map_attributes = $this->callback->getFlippedAttributes();

		if(is_object($this->data)){
			$this->processObjData();
		}else{

			$this->processArrayData();
		}
	
	}

	public function processArrayData()
	{
		$keys = $this->callback->getDataKeys();

		$data = [];

		foreach($keys as $key):

			$data_key = $this->callback->$key;

			if(is_closure($data_key)){
				$this->$key = $data_key($this->data);
			}else{

				$this->$key = $this->data[$data_key];
			}


		endforeach;
	
	}

	public function processObjData()
	{

		$keys = $this->callback->getDataKeys();

		$data = [];

		foreach($keys as $key):
			$data_key = $this->callback->$key;

			$this->$key = $this->data->$data_key;
		endforeach;
	}

}