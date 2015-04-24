<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo ($title); ?></title>
<link rel="stylesheet" href="/website/Public/css/master.css">
</head>
<body>
	<div id="header">
		<div class="wraper">
			<div class="nav">
				<a href="<?php echo U('lists');?>">Lists</a>
				<a href="<?php echo U('add');?>">Add</a>
			</div>
		</div>
	</div>
	
	<div id="article" class="wraper">
		<?php if($data['id']): ?><form action="<?php echo U('article_update');?>" method="post" id="ca_post">
		<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
		<?php else: ?>
		<form action="<?php echo U('article_create');?>" method="post" id="ca_post"><?php endif; ?>
		<div class="formDv">
			<h1>规范填写内容</h1>
		</div>
		<div class="formDv">
			<input type="text" class="formTxt" name="title" id="title" placeholder="Article Title" value="<?php echo ($data["title"]); ?>">
		</div>
		<div class="formDv">
			<input type="text" class="formTxt" name="title_page" id="title_page" placeholder="Page Title" value="<?php echo ($data["title_page"]); ?>">
		</div>
		<div class="formDv">
			<input type="text" class="formTxt" name="keywords" id="keywords" placeholder="KeyWords" value="<?php echo ($data["keywords"]); ?>">
		</div>
		<div class="formDv">
			<input type="text" class="formTxt" name="description" id="description" placeholder="Description" value="<?php echo ($data["description"]); ?>">
		</div>
		<div class="formDv">
			<textarea name="content" id="content" style="width:100%;height:400px;visibility:hidden;"><?php echo ($data["content"]); ?></textarea>
		</div>
		<div class="formDv">
			<input type="submit" class="formSubmit" value="Submit">
		</div>
		</form>
	</div>

</body>
<script type="text/javascript" src="/website/Public/js/jquery.js"></script>
<script charset="utf-8" src="/website/Public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/website/Public/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		items : [
			'source','preview','|','formatblock','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link','|','clearhtml'],
		afterCreate : function() { 
			this.sync(); 
		}, 
		afterBlur:function(){ 
			this.sync(); 
		}
	});
});

$(function(){

	$('#ca_post').submit(function(){
		var ln = $(this).attr('action');
		var dt = $(this).serializeArray();
		$.ajax({
			url : ln,
			type : 'post',
			dataType : 'json',
			data : dt,
			success : function(json){
				if(json.status==1){
					alert('Success');
					window.location.href = '<?php echo U("lists");?>';
				}else{
					alert(json.tips);
				}
			}
		});
		return false;
	});
});


</script>
</html>