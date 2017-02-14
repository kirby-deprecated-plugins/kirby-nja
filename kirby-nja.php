<?php
include __DIR__ . DS . 'lib' . DS . 'routes.php';
include __DIR__ . DS . 'lib' . DS . 'validate.php';
include __DIR__ . DS . 'lib' . DS . 'get.php';
include __DIR__ . DS . 'lib' . DS . 'set.php';
include __DIR__ . DS . 'lib' . DS . 'save.php';
include __DIR__ . DS . 'registry' . DS . 'page-methods.php';

//http://localhost/likedislike/nja/asdad/wwer?type=like

if(c::get('plugin.nja.definitions', true)) {
	$kirby->set('blueprint', 'fields/likes', __DIR__ . '/registry/likes.yml');
	$kirby->set('blueprint', 'fields/dislikes', __DIR__ . '/registry/dislikes.yml');
}

if(c::get('plugin.nja.snippet', 'nja')) {
	$kirby->set('snippet', c::get('plugin.nja.snippet', 'nja'), __DIR__ . '/registry/snippet.php');
}