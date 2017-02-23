<?php
namespace Nja;
use c;

class Cleanup {
	function __construct() {
		$this->cleanup = c::get('plugin.nja.cleanup', false);
	}

	function run($id) {
		if(!$this->cleanup) return;
		$pattern = page($id)->root() . DS . c::get('plugin.nja.records.page.slug', 'nja') . DS . '*';
		$time = time();
		foreach(glob($pattern) as $file) {
			if(!is_file($file)) continue;

			$parts = pathinfo($file);
			if(isset($parts['extension'])) continue;

			if($time - filemtime($file) >= 60 * 60 * 24 * $this->cleanup) {
				unlink($file);
			}
		}
	}
}