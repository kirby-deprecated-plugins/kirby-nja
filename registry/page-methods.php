<?php
namespace Nja;
use page;
use c;

if(c::get('plugin.nja.methods', true)) {
	page::$methods['nja'] = function($page) {
		$Get = new Get();
		$value = $Get->value($page->id());
		return $value;
	};

	page::$methods['liked'] = function($page) {
		$Get = new Get();
		$value = $Get->value($page->id());
		if($value == 1) return true;
	};

	page::$methods['disliked'] = function($page) {
		$Get = new Get();
		$value = $Get->value($page->id());
		if($value == -1) return true;
	};
}