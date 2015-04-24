<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->title = C('APP_TITLE');
		$this->display();
	}

	public function _empty(){
		echo '404';
	}

}