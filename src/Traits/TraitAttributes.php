<?php 

namespace PCC\Traits;

trait TraitAttributes{

	protected $attributes = [];

	protected $flipped_attributes = [];

	public function attributes($array)
	{
	
		$this->setTagAttributes($array);
	
	}

	public function getTagAttributes($tag_attributes=null)
	{
		if(empty($tag_attributes)) $tag_attributes = $this->tag_attributes;

		if(! count($tag_attributes) > 0) return '';

		$attributes = [];
	
		foreach($tag_attributes as $k=>$v) {
			
			array_push($attributes, $this->getTagAttribute($k, $v));
		}

		return implode(' ', $attributes);
	
	}

	public function getTagAttribute($name, $value){
		$value = is_string($value) ? $value : implode(' ', $value);
		
		$attribute = $name . '="' . $value . '"';
		
		return $attribute;
	}

	public function setTagAttributes($array)
	{
	
		$this->setAttribute('tag_attributes', $array);
	
	}

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
