<?php

use PCC\Component as c;

class NavTab extends PHPUnit_Framework_TestCase{

    public function testNavTab() {
    	
    	$output = c::NavTab($this->getArrayData(), ['attributes'=>['id' => 'navTab']]);

		$this->assertContains('login', $output);
    }


    public function getArrayData()
    {
    
		$data = [
			[
				'tab' => 'Login',
				'content' => 'Login page'
			],

			[
				'tab' => 'Sign Up',
				'content' => 'Register page'
			]
		];

		return $data;
    
    }

}
