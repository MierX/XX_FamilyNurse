<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="../../../../Public/h-ui/lib/html5shiv.js"></script>
	<script type="text/javascript" src="../../../../Public/h-ui/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="../../../../Public/h-ui/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="../../../../Public/h-ui/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="../../../../Public/h-ui/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="../../../../Public/h-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="../../../../Public/h-ui/static/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="../../../../Public/h-ui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>主页</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			border: 0;
			text-decoration: none;
		}
		a:hover {
			text-decoration: none;
		}
		body {
			background-color: #f6f6f6;
		}
		#top {
			width: 100%;
			height: 55px;
			border-bottom: 1px #E6E6E6 solid;
			background-color: #ffffff;
			position: fixed;
		}
		#left {
			float: left;
			margin-left: 450px;
			width: 695px;
			border: 1px #E6E6E6 solid;
			background-color: #ffffff;
			margin-top: 65px;
		}
		#right {
			float: left;
			width: 295px;
			margin-top: 65px;
			margin-left: 8px;
		}
		#right1 {
			float: left;
			width: 100%;
			height: 195px;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
		#right2 {
			float: left;
			width: 100%;
			height: 240px;
			margin-top: 10px;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
		#right3 {
			float: left;
			width: 100%;
			height: 355px;
			margin-top: 10px;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
		#top-ul > li {
			float: left;
			margin-left: 30px;
			font-size: 18px;
			margin-top: 18px;
		}
		#right1-ul > li {
			float: left;
			margin-top: 20px;
			margin-left: 58px;
			font-size: 20px;
		}
		#right1-ul1 > li {
			float: left;
			font-size: 18px;
		}
		#right2-ul > li {
			margin-left: 20px;
			margin-top: 10px;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div id="top">
		<div id="title" style="margin-left: 450px;float: left">
			<a href="<?php echo U('index');?>" style="font-size: 32px;">XX家庭护士网</a>
		</div>
		<ul id="top-ul">
			<li>
				<a href="<?php echo U('index');?>">公告</a>
			</li>
			<li>
				<a href="<?php echo U('Patient/index');?>">患者需求</a>
			</li>
			<li>
				<a href="<?php echo U('Nurse/index');?>">驻站护士</a>
			</li>
		</ul>
		<div id="search" style="float: left;margin-left: 50px;margin-top: 18px;background-color: #f6f6f6;padding-left: 10px;">
			<input type="text" class="input-text" style="background-color: #f6f6f6;width: 180px;border: none;" name="keyword" value="" placeholder="请输入您想要搜索的内容" />
			<input type="button" class="btn radius" value="搜索" style="border: none; background-color: #f6f6f6" onclick="search()" />
		</div>
		<div id="info" style="float: left;font-size: 28px;margin-top: 14px;margin-left: 140px;">
			<i class="Hui-iconfont">
				<a href="<?php echo U('User/index');?>" title="<?php echo ($user["name"]); ?>">&#xe625;</a>
			</i>
			&nbsp;&nbsp;
			<?php if(empty($user["name"])): ?><i class="Hui-iconfont">
					<a href="<?php echo U('login');?>" title="登陆">&#xe645;</a>
				</i>
			<?php else: ?>
				<i class="Hui-iconfont">
					<a href="<?php echo U('logout');?>" title="注销">&#xe634;</a>
				</i><?php endif; ?>
		</div>
	</div>
	<div id="left"></div>
	<div id="right">
		<div id="right1">
			<ul id="right1-ul">
				<li>
					<?php if($user["role"] == 'Nurse'): ?><i class="Hui-iconfont">
							<a href="<?php echo U('Nurse/index');?>">&#xe627;</a>
						</i>
						<?php else: ?>
						<i class="Hui-iconfont">
							<a href="<?php echo U('Need/add');?>">&#xe60c;</a>
						</i><?php endif; ?>
				</li>
				<li>
					<i class="Hui-iconfont">
						<a href="<?php echo U('Talk/index');?>">&#xe68a;</a>
					</i>
				</li>
				<li>
					<i class="Hui-iconfont">
						<a href="<?php echo U('User/index');?>">&#xe686;</a>
					</i>
				</li>
			</ul>
			<ul id="right1-ul1">
				<?php if($user["role"] == 'Nurse'): ?><li style="margin-left: 40px">看需求</li>
					<?php else: ?>
					<li style="margin-left: 40px">发需求</li><?php endif; ?>
				<li style="margin-left: 24px">看信箱</li>
				<li style="margin-left: 24px">查记录</li>
			</ul>
			<ul style="margin-top: 120px">
				<li style="margin-left: 5%;font-size: 14px">
					<i class="Hui-iconfont" style="color: red">&#xe600;</i>
					<a href="<?php echo U('Nurse/index');?>">查看医生</a>
				</li>
				<li>
					<Hr style="width: 90%; margin-left: 5%; background-color: #f6f6f6;margin-top: 10px;margin-bottom: 10px;" size="4">
				</li>
				<li style="margin-left: 5%;font-size: 14px">
					<i class="Hui-iconfont">&#xe62c;</i>
					<a href="<?php echo U('User/index');?>">个人中心</a>
				</li>
			</ul>
		</div>
		<div id="right2">
			<ul id="right2-ul">
				<li style="margin-top: 30px;">姓名：<?php echo ((isset($user["name"]) && ($user["name"] !== ""))?($user["name"]):'未登录'); ?></li>
				<?php if($user["role"] == 'User'): ?><li>身份：用户</li>
				<?php elseif($user["role"] == 'Nurse'): ?>
					<li>身份：护士</li>
				<?php else: ?>
					<li>身份：未登录</li><?php endif; ?>
				<?php if($user["sex"] == 1): ?><li>性别：男</li>
					<?php elseif($user["sex"] == 2): ?>
					<li>性别：女</li>
					<?php else: ?>
					<li>性别：未登录</li><?php endif; ?>
				<li>年龄：<?php echo ((isset($user["age"]) && ($user["age"] !== ""))?($user["age"]):'未登录'); ?></li>
				<li>手机：<?php echo ((isset($user["phone"]) && ($user["phone"] !== ""))?($user["phone"]):'未登录'); ?></li>
				<?php if(!empty($user["addtime"])): ?><li>注册时间：<?php echo (date('Y-m-d H:i:s', $user["addtime"])); ?></li>
				<?php else: ?>
					<li>注册时间：未登录</li><?php endif; ?>
			</ul>
		</div>
		<div id="right3">
			<p style="margin-top: 10px;margin-left: 15px">
				<i class="Hui-iconfont" style="font-size: 18px">&#xe69d;&nbsp;&nbsp;我的收藏</i>
				<input type="text" class="input-text" style="float: right;width: 25px;height: 25px;margin-right: 20px;margin-top: 2px;background-color: #f6f6f6;border: none;text-align: center;" value="0" />
				<hr style="width: 90%;background-color: #f6f6f6;margin-left: 5%;" size="5" />
			</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
</html>