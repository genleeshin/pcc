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

	public static function js($name=null)
	{
	
		if($name) return static::$data['js'][$name] = $name . '.js';

		return (array_key_exists('js', static::$data) ? static::$data['js'] : []);
	
	}


	public static function css($name=null)
	{
	
		if($name) return static::$data['css'][$name] = $name . '.css';

		return (array_key_exists('css', static::$data) ? static::$data['css'] : []);
	
	}

	public static function __callStatic($method, $args=null){
		// to set a key=>val use App::key($val)
		// to set js or css use App::js('jquery') which will add jquery.js
		// App::css('bootstrap') will add bootstrap.css

		if($method=='js')
			return static::js($args);

		if($method=='css')
			return static::css();

		if(empty($args) && array_key_exists($method, static::$data))
    		return static::$data[$method];

        else if(count($args)==1)
           return static::$data[$method] = $args[0];

       elseif(count($args)==2)
       		return static::$data[$method][$args[0]] = $args[1];
        else
            return null;
	}
}