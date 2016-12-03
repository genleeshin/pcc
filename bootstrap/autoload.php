<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';


// Include common files

require_once __DIR__ . '/../src/helpers.php';


app('root', realpath(__DIR__.'/../'));