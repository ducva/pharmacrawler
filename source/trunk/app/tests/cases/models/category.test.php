<?php
/* Category Test cases generated on: 2011-04-28 14:22:32 : 1304000552*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.category');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}

}
?>