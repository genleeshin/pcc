<?php

use PCC\Component as c;

class NavTab extends PHPUnit_Framework_TestCase{

    public function testNavTab() {
    	
    	$list = c::NavTab($this->getArrayData(), function($at){
			$at->tabs = ['login' => 'Login', 'register' => 'Register'];
			$at->active = 'register';
		});

		$this->assertContains('register', $list);
    }


    public function getArrayData()
    {
    
    	$data = [
			[
				'tab' => 'login',
				'content' => 'Login page'
			],

			[
				'tab' => 'register',
				'content' => 'Register page'
			]
		];

		return $data;
    
    }

}
