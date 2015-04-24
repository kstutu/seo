<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SignIn</title>
<link rel="stylesheet" href="/website/Public/css/master.css">
<style type="text/css">
body{background: #FFF;}
.s{width: 40%;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;height: 150px;}
#pwd{width: 90%;height: 36px;border: none;border-bottom: 2px solid #00338d;outline: none;line-height: 36px;}
input::-webkit-input-placeholder{color: #00338d;font-size: 16px;}
#submit{border: none;outline: none;width: 10%;background: none;font-size: 18px;color: #00338d;cursor: pointer;}
</style>
</head>
<body>
	<div class="s">
		<form action="<?php echo U('getpass');?>" method="post">
			<input type="password" name="pwd" id="pwd" placeholder="keys"><input type="submit" id="submit" value="Go">
		</form>
	</div>
</body>
</html>