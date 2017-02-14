<?php
namespace Nja;
use c;
use f;

class Validate {
	function validIP() {
		if(in_array( $_SERVER['REMOTE_ADDR'], c::get('plugin.nja.blocked.ips', []))) {
			return false;
		}
		return true;
	}
}