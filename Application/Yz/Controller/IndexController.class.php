<?php
namespace Yz\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->display();
	}

	public function getpass(){
		$d = I();
		$pwd = strtoupper(sha1($d['pwd']));
		if($pwd=='B4C4FFC28A9314D6502D2982BBF26B2F85B8B41E'){
			session('access',1);
			$this->redirect('master/index/index');
		}else{
			$this->error('Error !');
		}
	}
}