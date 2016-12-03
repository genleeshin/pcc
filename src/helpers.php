<?php 

function d($var){
	if(is_array($var) || is_object($var))
		return parr($var);
		
	var_dump($var);
}

function dd($var){
	die(d($var));
}

function parr($array){
	echo '<pre>' . var_dump($array) . '</pre>';
}

function cout($m){
	echo "\n-------------------------";
    echo $m;
    echo "\n-------------------------";
}

function value($value, $default=''){
	return isset($value)?$value:$default;
}

function config($key=false){
    return array_get(PCC\Core\Config::all(), $key);

}

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

function app($key, $value=null){
    if($value) 
        return PCC\Core\App::$key($value);

    return PCC\Core\App::$key();
}

function view($tpl, $data=null){
    $tpl = app('root') . '/views/' . str_replace('.', '/', $tpl) . '.php';

    return output($tpl, $data);
}

function is_closure($t) {
    return ($t instanceof \Closure);
}