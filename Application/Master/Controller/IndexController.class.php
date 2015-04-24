<?php
namespace Master\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function _initialize(){
		$access = session('access');
		if($access!='1'){
			$this->redirect('home/index/index');
		}
		$this->title = C('APP_TITLE');
	}

	public function index(){
		$this->redirect('lists');
	}

	public function add(){
		$this->display();		
	}

	public function article_create(){
		$d = I();
		
		if(!$d['title'] || !$d['title_page'] || !$d['keywords'] || !$d['description'] || !$d['content']){
			$arr['status'] = 0;
			$arr['tips'] = 'null';
			$this->ajaxReturn($arr);
		}

		$d['content'] = $_POST['content'];
		$d['time'] = time();
		$d['ip'] = ip2long($_SERVER['REMOTE_ADDR']);
		$res = M('article')->data($d)->add();
		if($res){
			$arr['status'] = 1;
			$arr['tips'] = 'success';
			$arr['id'] = $res;
			$this->ajaxReturn($arr);
		}else{
			$arr['status'] = 0;
			$arr['tips'] = 'error';
			$this->ajaxReturn($arr);
		}
	}

	public function lists(){
		$data = M('article')->order('id desc')->select();
		$this->data = $data;
		$this->display();
	}

	public function edit(){
		$id = I('id');
		$data = M('article')->where(array('id'=>$id))->find();
		if(!$data){
			$this->redirect('lists');
		}
		$this->data = $data;
		$this->display('add');
	}

	public function article_update(){
		$d = I();
		
		if(!$d['title'] || !$d['title_page'] || !$d['keywords'] || !$d['description'] || !$d['content']){
			$arr['status'] = 0;
			$arr['tips'] = 'null';
			$this->ajaxReturn($arr);
		}

		$d['content'] = $_POST['content'];
		$res = M('article')->data($d)->save();
		if($res){
			$arr['status'] = 1;
			$arr['tips'] = 'success';
			$arr['id'] = $res;
			$this->ajaxReturn($arr);
		}else{
			$arr['status'] = 0;
			$arr['tips'] = 'error';
			$this->ajaxReturn($arr);
		}
	}

	public function article_delete(){
		$id = I('id');
		$res = M('article')->where(array('id'=>$id))->delete();
		if($res){
			$this->success('Done!');
		}else{
			$this->redirect('lists');
		}
	}



	public function _empty(){
		echo '404';
	}

}