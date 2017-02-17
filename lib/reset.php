<?php
namespace Nja;
use c;

class Reset {
	function __construct() {
		$this->likes_key = c::get('plugin.nja.likes.key', 'likes');
		$this->dislikes_key = c::get('plugin.nja.dislikes.key', 'dislikes');
	}
	function set($id) {
		$page = page($id);
		if($page) {
			$page->update(array(
				$this->likes_key => 0,
				$this->dislikes_key => 0
			));
		}
	}
}