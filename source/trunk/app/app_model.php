<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {
	var $allowDuplicateName = true;
	var $nameFieldName = 'Name';
	function beforeSave($options){
		if(!$this->allowDuplicateName){
			$this->log('before save','debug');
			// check exist name
			$test = $this->find('all', array('conditions'=>array($this->nameFieldName =>$this->data[$this->name][$this->nameFieldName])));
			if(count($test) >=2){
				$this->log('exists 2 rows','debug');
				return false;
			}
			else if(count($test) >0){
				if($this->data[$this->name][$this->primaryKey] > 0){ // Update case
					$this->log('Update case','debug');
					if($test[0]['Id'] == $this->data[$this->name][$this->primaryKey]){
						$this->log('OK');
						return true;
					}
				}
				return false;
			}
			$this->log('save', 'debug');
		}
		return parent::beforeSave($options);
	}
}
