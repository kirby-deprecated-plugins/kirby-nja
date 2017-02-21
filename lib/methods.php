<?php
class nja {
	public static function value($page) {
		$Get = new \Nja\Get();
		return $Get->value($page->id());
	}

	public static function isLike($page) {
		$Get = new \Nja\Get();
		$value = $Get->value($page->id());
		if($value == 1) return true;
	}

	public static function isDislike($page) {
		$Get = new \Nja\Get();
		$value = $Get->value($page->id());
		if($value == -1) return true;
	}

	public static function likeButton($buttons = null) {
		if(isset($buttons['likeButton']) && $buttons['likeButton']) {
			return true;
		} else {
			return c::get('plugin.nja.buttons.like', true);
		}
	}

	public static function dislikeButton($buttons = null) {
		if(isset($buttons['dislikeButton']) && $buttons['dislikeButton']) {
			return true;
		} else {
			return c::get('plugin.nja.buttons.dislike', true);
		}
	}
}