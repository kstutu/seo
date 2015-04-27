<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->title = C('APP_TITLE');
		$data = M('article')->select();
		$this->data = $data;
		$this->display('home');
	}

	public function detail(){
		$id = I('id');
		$data = M('article')->where(array('id'=>$id))->find();
		$this->data = $data;
		$this->display();
	}

	public function _empty(){
		echo '404';
	}

}