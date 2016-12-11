<?php

use PCC\Component as c;

class ListGroup extends PHPUnit_Framework_TestCase{

    public function testListGroup() {
    	
    	$list = c::ListGroup($this->getArrayData(), function($at){
            // list group requires name and url fields
            // we already have url field in the data array
            // need to tell it to use "title" field as "name" field

			$at->name = 'title';
		});

		$this->assertContains('ul', $list);
    }

    public function testListGroupObject()
    {

    	$list = c::ListGroup($this->getObjData(), function($at){
			$at->url = 'url';
			$at->name = 'name';
		});
    
    }

    public function testListGroupWithAttributes()
    {
        // give our list group an id
        // <ul class="list-group" id="listID">

    	$list = c::ListGroup($this->getObjData(), function($at){
            // tag attributes e.g <ul id="listID">
    		$at->attributes([
				'id' => 'listID'
			]);
		});
    
    }

    public function getArrayData()
    {
    
    	$data = [
			[
				'title' => 'Title',
				'url' => '/url1'
			],

			[
				'title' => 'Title2',
				'url' => '/url2'
			]
		];

		return $data;
    
    }

    public function getObjData()
    {
    
    	$o1 = new StdClass;

    	$o1->name = 'Harry Potter';

    	$o1->url = '/to/harry';

    	$o2 = new StdClass;

    	$o2->name = 'Lord of The Ring';

    	$o2->url = '/to/lotr';

    	$data[] = $o1;
    	$data[] = $o2;

    	return $data;    
    }
}
