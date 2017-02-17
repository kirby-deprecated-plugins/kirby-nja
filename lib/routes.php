<?php
namespace Nja;
use c;

kirby()->routes(array(
  array(
	'pattern' => 'nja/add/(:any)/(:all)',
	'action'  => function($value, $id) {
		$error = site()->visit(site()->errorPage());
		$ips = c::get('plugin.nja.blocked.ips', []);

		if(!in_array($value, [0, 1, -1])) return $error;
		if(in_array( $_SERVER['REMOTE_ADDR'], $ips)) return $error;
		if(!page($id)) return;

		$Get = new Get();
		$Set = new Set();
		$Save = new Save();

		$old_value = $Get->value($id);

		if(!$Set->value($id, $value)) return $error;

		$new_value = $Get->value($id);

		//echo $old_value . " " . $new_value;

		$Save->value($id, $old_value, $new_value);
	}
  )
));

if(site()->user()) {
	kirby()->routes(array(
	  array(
	  	'pattern' => 'nja/delete/(:all)',
	  	'action'  => function($id) {
	  		$panel_uri = c::get('plugin.nja.panel.uri', 'panel');
			$Delete = new Delete();
			$Delete->records($id);

			if(get('redirect')) {
				go($panel_uri . '/pages/' . $id . '/edit');
			}
		}
	  ),
	  array(
	  	'pattern' => 'nja/reset/(:all)',
	  	'action'  => function($id) {
	  		$panel_uri = c::get('plugin.nja.panel.uri', 'panel');
			$Reset = new Reset();
			$Reset->set($id);

			if(get('redirect')) {
				go('panel/pages/' . $id . '/edit');
			}
		}
	  ),
	));
}