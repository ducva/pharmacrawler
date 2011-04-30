<?php
class Category extends AppModel {
	var $name = 'Category';
	var $useTable = 'category';
	var $primaryKey = 'Id';
	var $displayField = 'Name';
	
	function beforeSave()
	{
		$this->log('before save','debug');
		// check exist name
		$test = $this->find('all', array('conditions'=>array('Name'=>$this->data['Category']['Name'])));
		if(count($test) >=2){
			$this->log('exists 2 rows','debug');
			return false;
		}
		else if(count($test) >0){
			if($this->data['Category']['Id'] > 0){ // Update case
				$this->log('Update case','debug');
				if($test[0]['Id'] == $this->data['Category']['Id']){
					$this->log('OK');
					return true;
				}
			}
			return false;
		}
		$this->log('save', 'debug');
		return true;
	}
}
?>