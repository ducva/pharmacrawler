<?php
/* Category Fixture generated on: 2011-04-28 14:22:32 : 1304000552 */
class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';
	var $table = 'category';

	var $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'Name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Position' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'Status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 2),
		'ListPropertyId' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'RootId' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'HotCategory' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'Link' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'Id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'Id' => 1,
			'Name' => 'Lorem ipsum dolor sit amet',
			'Position' => 1,
			'Status' => 1,
			'ListPropertyId' => 'Lorem ipsum dolor sit amet',
			'RootId' => 1,
			'HotCategory' => 1,
			'Link' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>