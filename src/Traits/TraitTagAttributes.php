<?php 

namespace PCC\Traits;

trait TraitTagAttributes{

	public function attributes($array)
	{
	
		$this->setTagAttributes($array);
	
	}

	public function tags($array)
	{
	
		$this->setTagAttributes($array);
	
	}

	public function setTags($name, $value)
	{
	
		$name = 'tag_' . $name;

		$this->$name = $value;
	
	}

	public function getTags($name)
	{
	
		$name = 'tag_' . $name;

		if($this->$name)
			return ' ' . $this->getTagAttributes($this->$name);

		return '';
	
	}

	public function style($style)
	{
	
		$this->style = $style;
	
	}

	public function setStyle($name, $value)
	{
		$name = 'style_' . $name;

		$this->$name = $value;
	
	}

	public function getStyle($style=null)
	{
	
		if($style)
			$style = 'style_' . $style;
		else
			$style = 'style';

		if($this->$style)
			return $this->$style;

		return '';
	
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

	
}
