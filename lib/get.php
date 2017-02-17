<?php
namespace Nja;
use f;
use c;

class Get {
	function __construct() {
		$this->records_slug = c::get('plugin.nja.records.slug', 'nja');
	}
	function value($id) {
		if(!$this->panelPageExists($id)) return 0;
		if(!$this->panelFileExists($id)) return 0;
		echo 'sant' . (int)f::read($this->panelPath($id));
		return (int)f::read($this->panelPath($id));
	}

	function panelPageExists($id) {
		return page($id . '/' . $this->records_slug);
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