<?php 

namespace PCC\Components;

use PCC\Core\App;

use PCC\Components\Component;

/**

attributes: [name, image, url]

*/

class MediaList extends Component{

	protected $data_keys = ['name', 'image', 'url'];

	public function render()
	{

		App::css('media-list');

		$list = '<div class="list-group media-list ' . $this->getStyle() . '" ' . $this->getTagAttributes() . '>';

		foreach($this->data as $data){
			$list .= $this->mkList($data);
		}

		$list .= '</div>';


		return $list;
	
	}

	public function mkList($data)
	{
	
		return '<a 
			class="list-group-item" 
			href="' . $data->url . '"> 
			<img src="' . $data->image . '" class="'. $this->getStyle('image') .'">
			<h3'. $this->getTags('name') . '>' . $data->name . '</h3></a>';
	
	}
}
