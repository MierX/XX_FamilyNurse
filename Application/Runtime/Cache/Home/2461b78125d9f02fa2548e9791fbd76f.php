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
	<!--/meta 作为公共模版分离出去-->
	<title>我的信箱</title>
	<style type="text/css">
		#content {
			margin: 5px 100px 0 100px;
		}
	</style>
</head>
<body>
	<div style="width: 90%;margin-left: 5%;">
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th>我</th>
						<th>对方</th>
						<th>最新消息</th>
						<th>时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$io): $mod = ($i % 2 );++$i;?><tr class="text-c">
							<td><?php echo ($io["me"]); ?></td>
							<td><?php echo ($io["he"]); ?></td>
							<td><?php echo ($io["content"]); ?></td>
							<td><?php echo (date('Y-m-d H:i:s',$io["addtime"])); ?></td>
							<td>
								<u style="cursor: pointer;text-decoration: none" onclick="show('与<?php echo ($io["he"]); ?>的私聊','<?php echo U('index');?>?uid=<?php echo ($io["me_id"]); ?>&nid=<?php echo ($io["he_id"]); ?>','0','0')" title="私聊">私聊</u>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
	$(function(){
		$('.table-sort').dataTable({
			"aaSorting": false,
			"aoColumnDefs": [
				{"orderable":false,"aTargets":[0,2,4]}
			],
			"searching":false,
			"bLengthChange":false,
		});

	});
	function show(title,url,w,h) {
		var account = "<?php echo (session('account')); ?>";
		if(account) {
			w = parent.document.body.clientWidth*0.25;
			h = parent.document.body.clientHeight*0.75;
			parent.layer_show(title,url,w,h);
		} else {
			alert('请先登录');
			parent.location.href = "<?php echo U('login');?>";
		}
	}
</script>
</html>