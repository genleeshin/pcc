<?php 

namespace PCC\Traits;

trait TraitAttributes{

	use TraitTagAttributes;

	protected $attributes = [];

	protected $flipped_attributes = [];

	public function setAttributes(array $attributes)
	{
	
		foreach($attributes as $key => $val)
			$this->setAttribute($key, $val);
	
	}

	public function setAttribute($key, $val)
    {
    
    	$this->attributes[$key] = $val;

    	if(is_string($val))
    		$this->flipped_attributes[$val] = $key;
    
    }

    public function getFlippedAttributes()
    {
    
    	return $this->flipped_attributes;
    
    }

    public function getAttribute($key)
    {
    
    	return array_key_exists($key, $this->attributes) ? $this->attributes[$key] : null;
    
    }

    public function getAttributes()
    {
    
    	return $this->attributes;
    
    }

	public function __get($key)
    {
        return $this->getAttribute($key);
    }

	public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    public function __isset($key)
    {
        return ! is_null($this->getAttribute($key));
    }
}
