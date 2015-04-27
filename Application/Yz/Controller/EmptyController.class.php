<?php
namespace Yz\Controller;
use Think\Controller;
class EmptyController extends Controller {

	public function index(){
		echo 'empty controller';
	}

	public function _empty(){
		echo '404';
	}

}