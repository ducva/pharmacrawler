<?php

class GetImageTestCase extends CakeTestCase{ 
function _getImage($url){
		$full_path = Configure::read('target_url').$url;
		
		$content = file_get_contents($full_path);
		$file_name = basename($full_path);
		$file = new File(Configure::read('image_path').$file_name, true, 'w');
		$file->write($content,'w', true);
		$file->close();
	}

	function ptestGetImage(){
		$url = 'upload/images/Product37347151482010.jpg';
		$this->_getImage($url);
	}
	
	function testGetImageLink(){
		$url = 'http://usavitaminonline.com/?v=pd&i=2';
		$content = file_get_contents($url);
		App::Import("Vendor", 'simple_html_dom');
		$html = new simple_html_dom();
		$html->load($content);
		$image = $html->find('img#imagesplacedisplay',0);
		echo $image->src;
	}
}