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
	
	function _processUrl($url){
		App::Import('Vendor', 'simple_html_dom');
		$html = new simple_html_dom();
		$content = file_get_contents($url);
		$html->load($content);
		
		
		$html->clear();
		unset($html);
	}
}