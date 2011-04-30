<?php

class CrawlerTestCase extends CakeTestCase {
	
	function startTest() {
		App::Import('Vendor','simple_html_dom');
		App::Import('Vendor', 'dbug');
	}
	function testGetProduct(){
		$url = 'http://usavitaminonline.com/?v=pd&i=3';
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		$link_image = $html->find('a#linkimagesshow',0)->href;
		$info = $html->find('table#ctl00_ContentPlaceHolder1_ctl01_reproductdetails tbody tr td', 0);
		
		$product_name = $info->find('span#ptitle',0)->innertext;
		
		$product_code = $info->find('span[style*=color: Black]', 1)->parent();
		if(isset($product_code)){
			echo $product_code->plaintext;
			//echo $product_code->next_sibling()->innertext;
			$test = $product_code->children(0);
			$code = trim(str_replace($test->outertext, '', $product_code->innertext));
			$this->assertEqual(' ND-RJ63.1', $code);
		}
		$product_price = $info->find('span[style*=color: Black]', 2);
		$price = $product_price->next_sibling()->first_child()->innertext;
		$product_company = $info->find('div#pdetail', 0);
		$this->assertEqual(trim('Sũa Ong Chúa Siêu Đẳng Nutrition Depot No 63.1, 60 Viên'), str_replace("&nbsp;", '', $product_name));
		$this->assertEqual(trim('750.000VNĐ'), str_replace("&nbsp;", '', $price));
		
		$test = $product_company->children(0);
		echo $test->outertext;
		$test->outertext = '';
		$company = trim(str_replace($test->outertext, '', $product_company->innertext));
		$this->assertEqual(trim('Nutrition Depot'), $company);
		
		$detail = $info->find('div[style*=width:510px]',0)->innertext;
		echo $detail;
		
		$html->clear();
		unset($html);
	}
	function endTest() {
	}

}
?>