<?php 

namespace PCC;

class Component{
	public static function __callStatic($method, $args)
	{
	
		$reflect  = new \ReflectionClass('PCC\\Components\\'.$method);
		$instance = $reflect->newInstanceArgs($args);

		return $instance->render();
	
	}
}
