<?php 

namespace PCC\Core;

class App
{
	protected static $data;
	
	public static function set($key, $value)
	{
	
		static::$data[$key] = $value;
	
	}

	public static function get($key)
	{

		if(! array_key_exists($key, static::$data))

			return null;
			

		return static::$data[$key];

	}

	public static function __callStatic($method, $args){
		if(empty($args) && array_key_exists($method, static::$data))
    		return static::$data[$method];

        else if(count($args)>0)
           return static::$data[$method] = $args[0];
       
        else
            return null;
	}
}