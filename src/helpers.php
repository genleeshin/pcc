<?php 

if (! function_exists('d')) {
    function d($var){
    	if(is_array($var) || is_object($var))
    		return parr($var);
    		
    	var_dump($var);
    }
}

if (! function_exists('dd')) {

    function dd($var){
    	die(d($var));
    }
}

if (! function_exists('parr')) {

    function parr($array){
    	echo '<pre>' . var_dump($array) . '</pre>';
    }
}

if (! function_exists('cout')) {

    function cout($m){
    	echo "\n-------------------------";
        echo $m;
        echo "\n-------------------------";
    }
}

if (! function_exists('value')) {

    function value($value, $default=''){
    	return isset($value)?$value:$default;
    }
}

if (! function_exists('config')) {

    function config($key=false){
        return array_get(PCC\Core\Config::all(), $key);

    }
}

if (! function_exists('array_get')) {

    function array_get($array, $key, $default = null)
    {
        if (is_null($key)) return $array;
        if (isset($array[$key])) return $array[$key];

        if(strpos($key, '.')===false) return [];
        foreach (explode('.', $key) as $segment)
        {
            if ( ! is_array($array) || ! array_key_exists($segment, $array))
            {
                return $default;
            }
            $array = $array[$segment];
        }
        return $array;
    }
}

if (! function_exists('output')) {

    function output($tpl, $data=null)
    {
        if($data)
            extract($data);

        ob_start();

        include($tpl);

        $output = ob_get_contents();

        ob_end_clean();

        return $output; 
    }
}

if (! function_exists('app')) {

    function app($key, $value=null){
        if($value) 
            return PCC\Core\App::$key($value);

        return PCC\Core\App::$key();
    }
}

if (! function_exists('view')) {

    function view($tpl, $data=null){
        $tpl = app('root') . '/views/' . str_replace('.', '/', $tpl) . '.php';

        return output($tpl, $data);
    }
}

if (! function_exists('is_closure')) {

    function is_closure($t) {
        return ($t instanceof \Closure);
    }
}