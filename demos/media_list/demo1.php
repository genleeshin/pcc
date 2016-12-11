<?php 

/**
 *@params [name, image, url]
 */

use PCC\Component as c;

$data = [
    [
        'title' => 'Media 1',
        'image' => 'http://placehold.it/50x50',
        'store' => 'argos.co.uk'
    ],

    [
        'title' => 'Media 2',
        'image' => 'http://placehold.it/50x50',
        'store' => 'currys.co.uk'
    ]
];



$output = c::MediaList($data, function($at){

	// parent tag attributes such as id, data-id etc
    $at->tags(['id' => 'MyMediaList']);

    // use title key of the data as name field
    $at->name = 'title';

    $at->url = function($data){
        return '/store/' . $data['store'];
    };

});