<?php
/**
 * @params [name, image, url]
 */

require __DIR__. '/../model.php';

use PCC\Component as c;

class MediaList extends PHPUnit_Framework_TestCase{

    public function testBasic() {
    	
    	$list = c::MediaList($this->getBasicArrayData());

		$this->assertContains('Media 1', $list);
    }

    public function testModelData()
    {
    
        $list = c::MediaList($this->getModelData(), function($at){
            // use title key of the data as name field
            $at->name = 'title';

            // or 

            //$at->setDataKeys(['name' => 'title']);
        });

        $this->assertContains('Media 1', $list);
    
    }

    public function testArrayDataWithClosure()
    {
    
        $output = c::MediaList($this->getArrayDataWithClosure(), function($at){
            // use title key of the data as name field
            $at->name = 'title';

            $at->url = function($data){
                return '/store/' . $data['store'];
            };

            // or 

            //$at->setDataKeys(['name' => 'title']);
        });

        $this->assertContains('Media 1', $output);
    
    }

    public function testModelDataWithTagsAndAttributes()
    {
    
        $list = c::MediaList($this->getModelData(), function($at){
            // parent tag attributes such as id, data-id etc
            $at->tags(['id' => 'MyMediaList']);
            $at->style('list-one');
            $at->name = 'title';
            $at->setImageStyle('image-circle');
            $at->setNameTags(['data-aj' => 'get']);
        });

        $this->assertContains('Media 1', $list);
    
    }

    public function getBasicArrayData()
    {
    
        $data = [
            [
                'name' => 'Media 1',
                'image' => 'http://placehold.it/50x50',
                'url' => 'argos.co.uk'
            ],

            [
                'name' => 'Media 2',
                'image' => 'http://placehold.it/50x50',
                'url' => 'currys.co.uk'
            ]
        ];

		return $data;
    
    }

    public function getModelData()
    {


        $d1 = new Model;

        $d1->title = 'Media 1';

        $d2 = new Model;

        $d2->title = 'Media 2';

        return [$d1, $d2];
    
    }

    public function getArrayDataWithClosure()
    {
    
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

        return $data;
    
    }
}
