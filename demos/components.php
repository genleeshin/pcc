<?php 

require __DIR__ . '/../bootstrap/autoload.php';

require __DIR__. '/../model.php';

$component = isset($_GET['comp'])?(string)$_GET['comp']:'list';

if($component=='list')
	include('list.php');
else
	include($component);


echo view('layout', compact('output'));
