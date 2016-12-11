<?php 

namespace PCC\Components;

use PCC\Components\Component;

/**

attributes: [url, title]

*/

class NavTab extends Component{

	protected $data_keys = ['tab', 'content'];

	public function render()
	{

		$tabs = [];

		foreach($this->data as $d){

			$tab = 'tab_' . strtolower(str_replace(' ', '_', $d->tab));

			$d->tab_id = $tab;

			$tabs[] = ['tab_id' => $tab, 'name' => $d->tab];

		}

		$active = $this->active?'tab_'.$this->active : $tabs[0]['tab_id'];

		return view('nav-tab.nav-tab', ['comp' => $this, 'active' => $active, 'tabs' => $tabs]);
	
	}
}
