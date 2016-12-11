<?php 

$dirs = array_diff(scandir(__DIR__), array('..', '.'));

$list = [];


foreach($dirs as $dir)
	foreach(glob($dir . "/*.php") as $file)
		$list[] = $file;


$output = "<ul class=\"list-group\">";

foreach($list as $l):

	$output .= "<a href=\"components.php?comp={$l}\" class=\"list-group-item\">{$l}</a>";

endforeach;

$output .= "</ul>";
