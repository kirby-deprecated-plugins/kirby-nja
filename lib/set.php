<?php
namespace Nja;
use f;
use c;

class Set {
	function value($id, $value) {
		$this->createPage($id);
		return $this->createFile($id, $value);
	}

	function createPage($id) {
		if(!page($id . '/nja')) {
			page($id)->children()->create(c::get('plugin.tja.panel.page', 'nja'), c::get('plugin.tja.panel.page', 'nja'), array(
				'title' => '_Nja',
			));
		}
	}
	function createFile($id, $value) {
		if($value >= -1 && $value <= 1) {
			return f::write(
				page(
					$id . '/' . c::get('plugin.tja.panel.page', 'nja'))->root() . DS . md5($_SERVER['REMOTE_ADDR']),
					$value
				);
		}
	}
}