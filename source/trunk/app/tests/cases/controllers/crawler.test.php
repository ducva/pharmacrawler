<?php

class CrawlerTestCase extends CakeTestCase {
	
	function startTest() {
		App::Import('Vendor','simple_html_dom');
		App::Import('Vendor', 'dbug');
	}
	function testGetProduct(){
		$url = 'http://usavitaminonline.com/?v=pd&i=755';
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		$link_image = $html->find('a#linkimagesshow',0)->href;
		$info = $html->find('table#ctl00_ContentPlaceHolder1_ctl01_reproductdetails tbody tr td', 0);
		
		$product_name = $info->find('span#ptitle',0)->innertext;
		
		$product_code = $info->find('span[style*=color: Black]', 0);
		$product_price = $info->find('span[style*=color: Black]', 2);
		$product_company = $info->find('div#pdetail', 0);
		$this->assertEqual(trim('Sheep Placenta Concentrate 720mg: Nhau Thai Cừu Cô Đặc'), str_replace("&nbsp;", '', $product_name));
		$this->assertEqual(trim('450.000 VNĐ'), str_replace("&nbsp;", '', $product_price->next_sibling()->first_child()->innertext));
		$test = $product_company->children(0);
		echo $test->outertext;
		$test->outertext = '';
		$this->assertEqual(trim('NU-HEALTH'), trim($product_company->plaintext));
		$html->clear();
		unset($html);
	}
	function endTest() {
	}

}
?>