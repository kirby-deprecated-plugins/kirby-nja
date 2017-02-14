<?php
namespace Nja;

class Save {
	function value($id, $old_value, $new_value) {
		if( $old_value == $new_value) {
			return;
		}

		# ALLT FUNKAR!!!

		$this->addLike($id, $new_value);
		$this->addDislike($id, $new_value);
		$this->removeLike($id, $old_value);
		$this->removeDislike($id, $old_value);
	}

	function addLike($id, $new_value) {
		if($new_value == 1) {
			page($id)->increment('likes');
		}
	}

	function addDislike($id, $new_value) {
		if($new_value == -1) {
			page($id)->increment('dislikes');
		}
	}

	function removeLike($id, $old_value) {
		if($old_value == 1) {
			page($id)->decrement('likes');
		}
	}

	function removeDislike($id, $old_value) {
		if($old_value == -1) {
			page($id)->decrement('dislikes');
		}
	}
}