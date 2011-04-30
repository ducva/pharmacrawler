<?php
/* Product Fixture generated on: 2011-04-30 02:32:25 : 1304130745 */
class ProductFixture extends CakeTestFixture {
	var $name = 'Product';
	var $table = 'product';

	var $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'Name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Detail' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Image' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ImageNote' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 2),
		'Views' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'Orders' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'Price' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PriceQTM' => array('type' => 'string', 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'HotProduct' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'CreateDate' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'ModifyDate' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'categoryId' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'unitId' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'currencyId' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'providerId' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'manufacturerId' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => array('Id', 'Image'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'Id' => 1,
			'Name' => 'Lorem ipsum dolor sit amet',
			'Code' => 'Lorem ipsum dolor sit amet',
			'Description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Image' => 'Lorem ipsum dolor sit amet',
			'ImageNote' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Status' => 1,
			'Views' => 1,
			'Orders' => 1,
			'Price' => 'Lorem ipsum dolor sit amet',
			'PriceQTM' => 'Lorem ipsum dolor sit amet',
			'HotProduct' => 1,
			'CreateDate' => '2011-04-30 02:32:25',
			'ModifyDate' => '2011-04-30 02:32:25',
			'categoryId' => 1,
			'unitId' => 1,
			'currencyId' => 1,
			'providerId' => 1,
			'manufacturerId' => 1
		),
	);
}
?>