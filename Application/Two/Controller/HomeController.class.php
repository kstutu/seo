<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller{

	public function _initialize(){
		$this->titleLater = " - V2.0 Dr.K";
	}

	public function homeHead(){
		
	}

	public function Iwannerdo(){
		echo $_SERVER['HTTP_REFERER'];
		$a = $_SERVER;
		dump($a);
	}

	public function _empty(){
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		echo '404';
	}


}