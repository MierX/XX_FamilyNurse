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
	<style type="text/css">
		body {
			border: 0;
			padding: 0;
			margin: 0;
		}
	</style>
</head>
<body>
	<div style="margin: auto;position: fixed;width: 50%;margin-left: 25%;">
		<form>
			<input class="input-text size-L radius size-L radius" type="hidden" value="<?php echo ($user["id"]); ?>" />
			<input class="input-text size-L radius" type="text" value="<?php echo ($user["name"]); ?>" />
			<?php if($user["role"] == 'User'): ?><input class="input-text size-L radius" type="text" value="用户" readonly="readonly" />
				<?php elseif($user["role"] == 'Nurse'): ?>
					<input class="input-text size-L radius" type="text" value="护士" readonly="readonly" /><?php endif; ?>
			<?php if($user["sex"] == 1): ?><input class="input-text size-L radius" type="text" value="男性" />
				<?php elseif($user["sex"] == 0): ?>
				<input class="input-text size-L radius" type="text" value="女性" /><?php endif; ?>
			<input class="input-text size-L radius" type="number" value="<?php echo ($user["age"]); ?>周岁" />
			<input class="input-text size-L radius" type="text" value="<?php echo ($user["phone"]); ?>" />
			<input class="input-text size-L radius" type="text" value="<?php echo ($user["card"]); ?>" readonly="readonly" />
			<?php if($user["role"] = 'Nurse'): ?><input class="input-text size-L radius" type="text" value="<?php echo ($user["work-year"]); ?>年" />
				<input class="input-text size-L radius" type="text" value="<?php echo ($user["work-year"]); ?>" />
				<input class="input-text size-L radius" type="text" value="<?php echo ($user["remark"]); ?>" /><?php endif; ?>
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