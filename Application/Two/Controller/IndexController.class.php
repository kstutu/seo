<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController{

	/**
	 * 主页面，找人（用的文件缓存，临时存储数据）
	 * @return 页面展示
	 */
	public function index(){
		$this->title = "找人";
		$p = F('mongo');
		$this->dv = $p;
		$this->display();
	}

	/**
	 * 写名片的页面
	 * @return 页面展示
	 */
	public function mp(){
		$this->title = "写名片";
		$this->display();
	}

	public function editmp(){
		$this->title = "我的名片";
		$this->display();
	}

	/**
	 * 名片夹的功能
	 * @return 页面展示
	 */
	public function mpj(){
		$this->title = '名片夹';
		$this->display();
	}

	public function addMps(){
		$d = I();
		$d['_id'] = '5523a53e97ac9ee412469157';
		$s = D('Common/Vdemo')->data($d)->save();
		$this->ajaxReturn($s);
	}

	/**
	 * 图片异步上传模块
	 * @return [type - ajax] [图片的存储名]
	 */
	public function uppicPost(){
		import("ORG.Net.UploadFile");
		$upload = new \UploadFile();
		$upload->saveRule = md5(time().$_FILES['Filedata']['name']);
		$upload->savePath = './Public/Uploads/';
		$info = $upload->upload();
		if(!$info) {
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
			$this->ajaxReturn($info[0]['savename']);
		}
	}

	public function test(){
		$d = I();
		if(!$d['username']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'用户名必须填写!'));
		}
		if(!$d['company']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'请填写您的公司名!'));
		}
		if(!$d['job']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'请填写您的职位信息!'));
		}
		if(!$d['info']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'至少写上一个介绍信息哦!'));
		}
		$nd = F('mongo') ? F('mongo') : array();
		$nd[] = $d;
		F('mongo',$nd);
		$this->ajaxReturn(array('status'=>1,'tips'=>'success!','data'=>$nd));
	}


}