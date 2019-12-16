<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
	<title></title>
	<style type="text/css">
		body {
			border: 0;
			padding: 0;
			margin: 0;
			background-color: #e6e6e6;
		}
		input{
			width: 450px!important;
			display: block;
			border: none!important;
			border-bottom: 1px #ffffff dashed!important;
			outline: none;
			background-color: #E6E6E6;
		}
		ul > li {
			font-size: 16px;
			font-weight: bold;
			text-align: right;
		}
	</style>
</head>
<body>
<div style="margin-left: 35%;margin-top: 3%;float: left;">
	<ul>
		<li style="margin-top: 9px">账号：</li>
		<li style="margin-top: 15px">状态：</li>
		<li style="margin-top: 16px">用户名：</li>
		<li style="margin-top: 17px">身份：</li>
		<li style="margin-top: 15px">性别：</li>
		<li style="margin-top: 15px">年龄：</li>
		<li style="margin-top: 18px">联系电话：</li>
		<li style="margin-top: 15px">身份证号：</li>
		<?php if($data["role"] == 'Nurse'): ?><li style="margin-top: 17px">工号：</li>
			<li style="margin-top: 15px">绩效点：</li>
			<li style="margin-top: 17px">工龄：</li>
			<li style="margin-top: 15px">现在就职医院：</li>
			<li style="margin-top: 8px">自我介绍：</li><?php endif; ?>
	</ul>
</div>
<div style="width: 460px;float: left;margin-top: 3%;text-align: left;">
	<form style="border: none;outline: none;background-color: #E6E6E6" name="form1">
		<input class="input-text size-L radius" type="hidden" name="id" value="<?php echo ($data["id"]); ?>" readonly="readonly" />
		<input class="input-text size-L radius" type="hidden" name="role" value="<?php echo ($data["role"]); ?>" readonly="readonly" />
		<input class="input-text radius size-L" type="text" value="<?php echo ($data["account"]); ?>" readonly="readonly" />
		<?php if($data["status"] == 1): ?><input class="input-text size-L radius" type="text" value="正常" readonly="readonly" />
			<?php else: ?>
			<input class="input-text size-L radius" type="text" value="封号" readonly="readonly" /><?php endif; ?>
		<input class="input-text radius size-L" type="text" value="<?php echo ($data["name"]); ?>" readonly="readonly" />
		<?php if($data["role"] == 'User'): ?><input class="input-text size-L radius" type="text" value="用户" readonly="readonly" />
			<?php elseif($data["role"] == 'Nurse'): ?>
			<input class="input-text size-L radius" type="text" value="护士" readonly="readonly" /><?php endif; ?>
		<?php if($data["sex"] == 1): ?><input class="input-text size-L radius" type="text" name="sex" value="男性" readonly="readonly" />
			<?php elseif($data["sex"] == 2): ?>
			<input class="input-text size-L radius" type="text" name="sex" value="女性" readonly="readonly" /><?php endif; ?>
		<input class="input-text size-L radius" type="text" name="age" value="<?php echo ($data["age"]); ?>周岁" readonly="readonly" />
		<input class="input-text size-L radius" type="text" name="phone" value="<?php echo ($data["phone"]); ?>" readonly="readonly" />
		<input class="input-text size-L radius" type="text" value="<?php echo ($data["card"]); ?>" readonly="readonly" />
		<?php if($data["role"] == 'Nurse'): ?><input class="input-text size-L radius" type="text" value="<?php echo ($data["id"]); ?>" readonly="readonly" />
			<input class="input-text size-L radius" type="text" value="<?php echo ($data["merits"]); ?>" readonly="readonly" />
			<input class="input-text size-L radius" type="text" name="work-year" value="<?php echo ($data["work-year"]); ?>年" readonly="readonly" />
			<input class="input-text size-L radius" type="text" name="work-add" value="<?php echo ($data["work-add"]); ?>" readonly="readonly" />
			<div><?php echo htmlspecialchars_decode($data[remark]);?></div><?php endif; ?>
	</form>
</div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
</html>