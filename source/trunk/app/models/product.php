<?php
class Product extends AppModel {
	var $name = 'Product';
	var $useTable = 'product';
	var $primaryKey = 'Id';
	var $displayField = 'Name';
	var $allowDuplicateName = false;
	var $nameFieldName = 'Name';
}
?>