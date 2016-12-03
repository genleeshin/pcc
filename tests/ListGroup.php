<?php

use PCC\Component as c;

class ListGroup extends PHPUnit_Framework_TestCase{

    public function testListGroup() {
    	
    	$list = c::ListGroup($this->getArrayData(), function($at){
			$at->url = 'url';
			$at->title = 'name';
		});

		$this->assertContains('ul', $list);
    }

    public function testListGroupObject()
    {

    	$list = c::ListGroup($this->getObjData(), function($at){
			$at->url = 'url';
			$at->title = 'name';
		});
    
    }

    public function testListGroupWithAttributes()
    {

    	$list = c::ListGroup($this->getObjData(), function($at){
    		$at->attributes([
				'id' => 'listNice'
			]);
			$at->url = 'url';
			$at->title = 'name';
		});
    
    }

    public function getArrayData()
    {
    
    	$data = [
			[
				'name' => 'Title',
				'url' => '/url1'
			],

			[
				'name' => 'Title2',
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
