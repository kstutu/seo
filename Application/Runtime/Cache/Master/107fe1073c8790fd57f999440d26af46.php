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
	
	<div id="article" class="wrapers">
		<table id="lists_tb">
			<tr>
				<!-- <th>Id</th> -->
				<th>Title</th>
				<th width="160">Time</th>
				<th width="140">IP</th>
				<th width="120">Edit</th>
				<th width="120">Delete</th>
			</tr>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
				<!-- <td><?php echo ($v["id"]); ?></td> -->
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo (date('Y.m.d H:i',$v["time"])); ?></td>
				<td><?php echo (long2ip($v["ip"])); ?></td>
				<td><a class="link_tb" href="<?php echo U('edit',array('id'=>$v['id']));?>">Edit</a></td>
				<td><a class="link_tb" href="<?php echo U('article_delete',array('id'=>$v['id']));?>">delete</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>

</body>
<script type="text/javascript" src="/website/Public/js/jquery.js"></script>
<script charset="utf-8" src="/website/Public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/website/Public/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">

</script>
</html>