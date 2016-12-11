<?php 

namespace PCC\Components;

use PCC\Components\Component;

/**

attributes: [name, image, url]

*/

class MediaList extends Component{

	protected $data_keys = ['name', 'image', 'url'];

	public function render()
	{

		$list = '<div class="media-list ' . $this->getStyle() . '" ' . $this->getTagAttributes() . '>';

		foreach($this->data as $data){
			$list .= $this->mkList($data);
		}

		$list .= '</div>';


		return $list;
	
	}

	public function mkList($data)
	{
	
		return '<a 
			class="media-list-object" 
			href="' . $data->url . '"> 
			<img src="' . $data->image . '" class="'. $this->getStyle('image') .'">
			<h3'. $this->getTags('name') . '>' . $data->name . '</h3></a>';
	
	}
}
