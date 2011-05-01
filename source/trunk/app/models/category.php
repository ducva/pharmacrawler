<?php
class Category extends AppModel {
	var $name = 'Category';
	var $useTable = 'category';
	var $primaryKey = 'Id';
	var $displayField = 'Name';
	var $allowDuplicateName = false;
	var $nameFieldName = 'Name';

}
?>