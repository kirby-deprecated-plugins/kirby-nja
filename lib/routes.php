<?php
namespace Nja;
use c;

kirby()->routes(array(
	array(
		'pattern' => 'nja/add/(:any)/(:all)',
		'action'  => function($value, $id) {
			set_time_limit(c::get('plugin.nja.timeout', 4));
			$error = site()->visit(site()->errorPage());
			$ips = c::get('plugin.nja.blocked.ips', []);

			if(!in_array($value, [0, 1, -1])) return $error;
			if(in_array( $_SERVER['REMOTE_ADDR'], $ips)) return $error;
			if(!page($id)) return;

			$Get = new Get();
			$Set = new Set();
			$Save = new Save();
			$Cleanup = new Cleanup();

			$old_value = $Get->value($id);

			if(!$Set->value($id, $value)) return $error;

			$new_value = $Get->value($id);
			$Save->value($id, $old_value, $new_value);

			kirby()->trigger('nja.create', array(array('value' => $value, 'id' => $id)));
			$Cleanup->run($id);
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

				if(c::get('plugin.nja.hooks', true)) {
					kirby()->trigger('nja.delete', array($id));
				}

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

				kirby()->trigger('nja.reset', array($id));

				if(get('redirect')) {
					go('panel/pages/' . $id . '/edit');
				}
			}
		),
		array(
			'pattern' => 'nja/uninstall/(:any)',
			'action' => function($id) {
				if($id == site()->user()) {
					$success = true;
					foreach(site()->index() as $page) {
						if($page->slug() == c::get('plugin.nja.records.page.slug', 'nja')) {
							if(!page($page->id())->delete()) {
								$success = false;
							}
						}
					}
					if($success) {
						echo 'All the likes/dislikes has been deleted!';
					} else {
						echo 'One or more likes/dislikes pages was not deleted!';
					}
				}
			}
		),
	));
}