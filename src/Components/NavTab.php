<?php 

namespace PCC\Components;

use PCC\Components\Component;

/**

attributes: [url, title]

*/

class NavTab extends Component{
	public function render()
	{

		return view('nav-tab.nav-tab', ['tabs' => $this->tabs, 'active' => $this->active, 'data' => $this->collections]);
	
	}
}
