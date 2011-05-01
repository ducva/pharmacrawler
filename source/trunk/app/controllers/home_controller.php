<?php
class HomeController extends AppController {
	public $name = "Home";
	public $uses = array('Category', 'Product');
	var $helpers = array('Text');
	function __construct(){
		parent::__construct();
		App::Import('Vendor', 'simple_html_dom');
		App::Import('Library', 'String');
	}
	public function index(){
		if($this->RequestHandler->isPost()){
			if(strtolower($this->params['form']['task']) == 'submit'){
				$this->_processUrl($this->data['Category']['url']);
			}
		}
	}
	function _processUrl($url){
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		$this->debug('loaded content');
		// Menu left
		$list_cats = $html->find('ul#nav li');
		$arrCategory = array();
		$this->debug('Found category:' . count($list_cats));
		foreach($list_cats as $cat_element){
			$cat_link = trim($cat_element->find('a', 0)->href);
			$img = $cat_element->find('a img', 0);	
			$cat_name = trim(str_replace($img->outertext,'', $cat_element->find('a', 0)->innertext));
			$cat_name = trim(str_replace('&nbsp;', '', $cat_name));
			$cat_model = array(
									'Name'=>$cat_name,
									'Link'=> $cat_link,
									'Position' => 0
									);
			$this->Category->create();
			$this->Category->set($cat_model);
			$this->Category->save();
			$this->debug('saved category:'. $cat_name);
		}
		$html->clear();
		unset($html);
		
		//$this->set('cats', $arrCategory);
		$this->redirect('list_cat');
	}
	
	function list_cat(){
		
		
		$list_cats = $this->Category->find('all', array('conditions'=>array('Category.Link <>'=>'')));
		//dump($list_cats);die;
		$this->set('cats', $list_cats);
				
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
		
		$products = array();
		foreach($product_links as $link){
			$product = $this->_getProductDetail($link);
			if(isset($product)){
				$products[] = $product;
			}
		}
		foreach($products as $product){
			
			$product['categoryId']= $cat_id;
			$this->Product->create();
			$this->Product->set($product);
			$this->Product->save();
		}
	}
	
	function _getProductDetail($url){
		$product_link = Configure::read('target_url').$url;
		$html = new simple_html_dom();
		$content = file_get_contents($product_link);
		//$content = tidy_repair_string($content, array());
		$html->load($content);
		if(!isset($html)){
			return null;
		}
		$info = $html->find('table#ctl00_ContentPlaceHolder1_ctl01_reproductdetails tbody tr td', 0);
		if(!isset($info)){
			return null;
		}
		// Product Name
		$product_name = $info->find('span#ptitle',0)->innertext;
		$product_name = str_replace("&nbsp;", '', $product_name);
		
		// Product Price
		$product_price = $info->find('span[style*=color: Black]', 2);
		$price = trim(str_replace("&nbsp;", '', $product_price->next_sibling()->first_child()->innertext));
		
		// Product company
		$product_company = $info->find('div#pdetail', 0);
		$test = $product_company->children(0);
		$company = trim(str_replace($test->outertext, '', $product_company->innertext));
		
		// product code
		$product_code = $info->find('span[style*=color: Black]', 1)->parent();
		$code = '';
		if(isset($product_code)){
			$test = $product_code->children(0);
			$code = trim(str_replace($test->outertext, '', $product_code->innertext));
		}
		
		// product detail
		$detail = $info->find('div[style*=width:510px]',0)->innertext;
		
		// Product Image
		$image = $html->find('img#imagesplacedisplay',0)->src;
		$image_path = $this->_getImage($image);
		
		$product_data = array(
			'Name'=> $product_name,
			'Code'=> $code,
			'Price'=>$price,
			'PriceQTM'=>$price,
			'providerId'=>1,
			'Status'=>1,
			'View'=>0,
			'Detail'=>$detail,
			'Description'=>$this->Text->truncate($detail, 100),
			'Image'=>$image_path
		);
		return $product_data;
	}
	
	function _getImage($url){
		$full_path = Configure::read('target_url').$url;
		
		$content = file_get_contents($full_path);
		$file_name = basename($full_path);
		$file = new File(Configure::read('image_path').$file_name, true, 'w');
		$file->write($content,'w', true);
		$file->close();
		return $file_name;
	}
	
	
}