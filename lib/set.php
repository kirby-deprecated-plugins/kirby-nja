<?php
namespace Nja;
use f;
use c;

class Set {
	function __construct() {
		$this->records_slug = c::get('plugin.tja.records.slug', 'nja');
		$this->records_title = c::get('plugin.tja.records.title', '_Nja');
	}
	function value($id, $value) {
		$this->createPage($id);
		return $this->createFile($id, $value);
	}

	function createPage($id) {
		if(!page($id . '/' . $this->records_slug)) {
			page($id)->children()->create($this->records_slug, $this->records_slug, array(
				'title' => $this->records_title,
			));
		}
	}
	function createFile($id, $value) {
		if($value >= -1 && $value <= 1) {
			return f::write(
				page($id . '/' . $this->records_slug)->root() . DS . md5($_SERVER['REMOTE_ADDR']),
				$value
			);
		}
	}
}