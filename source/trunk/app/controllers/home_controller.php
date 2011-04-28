<?php
class HomeController extends AppController {
	public $name = "Home";
	public $uses = array('Category');
	
	function __construct(){
		parent::__construct();
		App::Import('Vendor', 'simple_html_dom');
		App::Import('Library', 'String');
	}
	public function index(){
		if($this->RequestHandler->isPost()){
			if(strtolower($this->params['form']['task']) == 'submit'){
				$this->_processUrl($this->data['url']);
			}
		}
	}

	public function get_products($cat_id){
		$cat_model = $this->Category->findById($cat_id);
		$cat_link = Configure::read('target_url') . $cat_model['Category']['Link'];
		
		$html = new simple_html_dom();
		$content = file_get_contents($cat_link);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		$a_products = $html->find('div#divBoxProducts div.contents div a');
		$product_links = array();
		foreach($a_products as $product){
			$product_links[] = $product->href;
		}
		
		//dump($product_links);die;
		foreach($product_links as $link){
			$this->_getProductDetail($link);die;
		}
	}
	
	function _getProductDetail($url){
		$product_link = Configure::read('target_url').$url;
		$html = new simple_html_dom();
		$content = file_get_contents($product_link);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		$link_image = $html->find('a#linkimagesshow',0)->href;
		$info = $html->find('table#ctl00_ContentPlaceHolder1_ctl01_reproductdetails tbody tr td', 0);
		
		$product_name = $info->find('span#ptitle',0)->innertext;
		
		$product_info = $info->find('div div', 1);
		$product_code = $product_info->find('div[style]', 1);
		$product_price = $product_info->find('div[style]', 2);
		$product_company = $product_info->find('div[style]', 3);
		dump($product_info->html);
		
	}
	function _processUrl($url){
		
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		
		// Menu left
		$list_cats = $html->find('ul#nav li');
		$arrCategory = array();
		App::Import('Model', 'Category');
		
		$strUtil = new String();
		foreach($list_cats as $cat_element){
			$cat_link = trim($cat_element->find('a', 0)->href);
			$img = $cat_element->find('a img', 0);	
			$cat_name = $strUtil->cleanInsert(trim(str_replace($img->outertext,'', $cat_element->find('a', 0)->innertext)), array('clean'=>'true'));
			$cat_model = array(
									'Name'=>$cat_name,
									'Link'=> $cat_link,
									'Position' => 0
									);
			$category = new Category();
			$category->set($cat_model);
			$category->save();
		}
		$html->clear();
		unset($html);
		
		//$this->set('cats', $arrCategory);
		$this->redirect('list_cat');
	}
	
	function list_cat(){
		$this->loadModel('Category');
		
		$list_cats = $this->Category->find('all', array('conditions'=>array('Category.Link <>'=>'')));
		//dump($list_cats);die;
		$this->set('cats', $list_cats);
				
	}
}