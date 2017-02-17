<?php
include __DIR__ . DS . 'lib' . DS . 'routes.php';
include __DIR__ . DS . 'lib' . DS . 'validate.php';
include __DIR__ . DS . 'lib' . DS . 'get.php';
include __DIR__ . DS . 'lib' . DS . 'set.php';
include __DIR__ . DS . 'lib' . DS . 'save.php';
include __DIR__ . DS . 'lib' . DS . 'delete.php';
include __DIR__ . DS . 'lib' . DS . 'reset.php';
include __DIR__ . DS . 'registry' . DS . 'page-methods.php';

if(c::get('plugin.nja.snippet', 'nja')) {
	$kirby->set('snippet', c::get('plugin.nja.snippet', 'nja'), __DIR__ . '/registry/snippet.php');
}

$kirby->set('field', 'nja', __DIR__ . DS . 'registry' . DS . 'nja');