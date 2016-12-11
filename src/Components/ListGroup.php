<?php 

namespace PCC\Components;

use PCC\Components\Component;

/**

attributes: [url, title]

*/

class ListGroup extends Component{

	protected $data_keys = ['name', 'url'];
	
	public function render()
	{

		$list = '<ul class="list-group" '. $this->getTagAttributes() .'>';

		if(is_object($this->data[0])):	

			foreach($this->data as $data)
				$list .= $this->mkList($data->name);
			
		else:

			foreach($this->data as $data)
				$list .= $this->mkList($data);

		endif;

		$list .= '</ul>';

		return $list;
	
	}

	public function mkList($value)
	{
	
		return '<li class="list-group-item">' . $value . '</li>';
	
	}
}
