<?php
namespace Nja;
use c;

class Delete {
	function __construct() {
		$this->records_slug = c::get('plugin.nja.records.slug', 'nja');
	}
	function records($id) {
		$page = page($id . '/' . $this->records_slug);
		if($page) {
			return $page->delete();
		}
	}
}