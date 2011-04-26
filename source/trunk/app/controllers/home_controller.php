<?php
class HomeController extends AppController {
	public $name = "Home";
	public $uses = array();
	
	public function index(){
		if($this->RequestHandler->isPost()){
			if(strtolower($this->params['form']['task']) == 'submit'){
				$this->_processUrl($this->data['url']);
			}
		}
	}

	public function get_products($url){
		$this->set('$url', $url);
		$cat_name = $this->params['url']['gn'];
		
	}
	function _processUrl($url){
		App::Import('Vendor', 'simple_html_dom');
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		// Menu left
		$list_cats = $html->find('ul#nav li');
		$arrCategory = array();
		foreach($list_cats as $cat_element){
			$cat_link = trim($cat_element->find('a', 0)->href);
			$img = $cat_element->find('a img', 0);	
			$cat_name = trim(str_replace($img->outertext,'', $cat_element->find('a', 0)->innertext));
			$arrCategory[] = array(
									'Name'=>$cat_name,
									'Link'=> $cat_link
									);
		}
		$html->clear();
		unset($html);
		
		$this->set('cats', $arrCategory);
		$this->render('list_cat');
		
	}
}