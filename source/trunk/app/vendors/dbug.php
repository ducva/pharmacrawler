<?php
include_once dirname(__FILE__).DS."dBug".DS."dBug.php";
function dump($var){
	new dBug($var);
}