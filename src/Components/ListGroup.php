<?php 

namespace PCC\Components;

use PCC\Components\Component;

/**

attributes: [url, title]

*/

class ListGroup extends Component{
	public function render()
	{

		$list = '<ul class="list-group" '. $this->getTagAttributes() .'>';
	
		foreach($this->collections as $data){
			$list .= $this->mkList($data->title);
		}

		$list .= '</ul>';

		return $list;
	
	}

	public function mkList($value)
	{
	
		return '<li class="list-group-item">' . $value . '</li>';
	
	}
}
