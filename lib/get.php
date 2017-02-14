<?php
namespace Nja;
use f;
use c;

class Get {
	function value($id) {
		if(!$this->panelPageExists($id)) return 0;
		if(!$this->panelFileExists($id)) return 0;
		return (int)f::read($this->panelPath($id));
	}

	function panelPageExists($id) {
		return page($id . '/' . c::get('plugin.tja.panel.page', 'nja'));
	}

	function panelFileExists($id) {
		if(f::exists($this->panelPath($id))) {
			return true;
		}
	}

	function panelPath($id) {
		return $this->panelPageExists($id)->root() . DS . md5($_SERVER['REMOTE_ADDR']);
	}
}