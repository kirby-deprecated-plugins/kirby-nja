<?php
namespace Nja;
use c;
use f;

class Validate {
	function __construct() {
		$this->ips = c::get('plugin.nja.blocked.ips', []);
	}

	function validIP() {
		if(in_array( $_SERVER['REMOTE_ADDR'], $this->ips)) {
			return false;
		}
		return true;
	}
}