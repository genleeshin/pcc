<?php 

use PCC\Component as c;

$data = [
	'list 1', 'list 2'
];



$output = c::ListGroup($data, function($at){
    // list group requires name and url fields
    // we already have url field in the data array
    // need to tell it to use "title" field as "name" field

	$at->name = 'title';
});