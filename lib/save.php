<?php
namespace Nja;
use c;

class Save {
	function __construct() {
		$this->likes_key = c::get('plugin.nja.likes.key', 'likes');
		$this->dislikes_key = c::get('plugin.nja.dislikes.key', 'dislikes');
	}

	function value($id, $old_value, $new_value) {
		if( $old_value == $new_value) {
			return;
		}

		$this->addLike($id, $new_value);
		$this->addDislike($id, $new_value);
		$this->removeLike($id, $old_value);
		$this->removeDislike($id, $old_value);
	}

	function addLike($id, $new_value) {
		if($new_value == 1) {
			page($id)->increment($this->likes_key);
		}
	}

	function addDislike($id, $new_value) {
		if($new_value == -1) {
			page($id)->increment($this->dislikes_key);
		}
	}

	function removeLike($id, $old_value) {
		if($old_value == 1) {
			page($id)->decrement($this->likes_key);
		}
	}

	function removeDislike($id, $old_value) {
		if($old_value == -1) {
			page($id)->decrement($this->dislikes_key);
		}
	}
}