<?php
class NjaField extends BaseField {
	static public $assets = array(
		'css' => array(
			'field.min.css',
		),
		'js' => array(
			'script.js',
		),
	);

	public function input() {
		$html = tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page()
		));
		return $html;
	}

	public function element() {
		$element = parent::element();
		$element->data('field', 'nja');
		$element->data('root', u());
		return $element;
	}
}