<?php
// http://localhost/likedislike/nja/1/projects
namespace Nja;
use c;

kirby()->routes(array(
  array(
	'pattern' => 'nja/(:any)/(:all)',
	'action'  => function($value, $id) {
		$error = site()->visit(site()->errorPage());
		if(!in_array($value, [0, 1, -1])) return $error;
		if(in_array( $_SERVER['REMOTE_ADDR'], c::get('plugin.nja.blocked.ips', []))) return $error;
		if(!page($id)) return;

		$Get = new Get();
		$Set = new Set();
		$Save = new Save();

		$old_value = $Get->value($id);

		if(!$Set->value($id, $value)) return $error;

		$new_value = $Get->value($id);

		$Save->value($id, $old_value, $new_value);
	}
  ),
  array(
	'pattern' => 'nja/delete/(:any)/(:all)',
	'action'  => function($type, $uid) {
		echo get('type');
		echo $uid;
	}
  )
));