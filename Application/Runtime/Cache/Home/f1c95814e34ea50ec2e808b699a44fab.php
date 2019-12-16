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
	<?php if($_SESSION['role']== 'Nurse'): ?><p onclick="collection1()" style="margin-left: 15px;font-size: 20px;cursor: default;">
			<i class="Hui-iconfont" style="cursor: pointer" title="收藏">&#xe630;</i>
		</p><?php endif; ?>
	<?php if($_SESSION['role']== 'User'): ?><p onclick="collection2()" style="margin-left: 15px;font-size: 20px;cursor: default;">
			<i class="Hui-iconfont" style="cursor: pointer" title="收藏">&#xe630;</i>
		</p><?php endif; ?>
	<div style="margin-left: 35%;margin-top: 3%;float: left;"><?php echo ($info); ?></div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
	function collection1() {
		if("<?php echo (session('role')); ?>" === 'Nurse') {
			$.ajax({
				url:"<?php echo U('Collection/nurseCollection');?>",
				type:"get",
				data:{
					"nurse":"<?php echo (session('id')); ?>",
					"needs":"<?php echo ($needs); ?>",
					"status":"<?php echo ($collection); ?>",
				},
				success:function (data) {
					if(data) {
						parent.location.reload();
					} else {
						alert('出错了~');
					}
				},
				error:function () {
					alert('未知错误！请调试！');
				}
			})
		}
	}
	function collection2() {
		if("<?php echo (session('role')); ?>" === 'User') {
			$.ajax({
				url:"<?php echo U('Collection/userCollection');?>",
				type:"get",
				data:{
					"user":"<?php echo (session('id')); ?>",
					"nurse":"<?php echo ($nurse); ?>",
					"status":"<?php echo ($collection); ?>",
				},
				success:function (data) {
					if(data) {
						parent.location.reload();
					} else {
						alert('出错了~');
					}
				},
				error:function () {
					alert('未知错误！请调试！');
				}
			});
		}
	}
</script>
</html>