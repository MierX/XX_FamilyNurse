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
	<title>我的记录</title>
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
						<th>需求标题</th>
						<th>发布人</th>
						<th>医护人</th>
						<th>评价</th>
						<th>开始时间</th>
						<th>完成时间</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$io): $mod = ($i % 2 );++$i;?><tr class="text-c">
							<td><?php echo ($io["needs_name"]); ?></td>
							<td><?php echo ($io["uid_name"]); ?></td>
							<td><?php echo ($io["nid_name"]); ?></td>
							<td>
								<?php if($io["score"] == 0): ?>尚未评价
								<?php elseif($io["score"] == 1): ?>
									极差
								<?php elseif($io["score"] == 2): ?>
									差
								<?php elseif($io["score"] == 3): ?>
									一般
								<?php elseif($io["score"] == 4): ?>
									好
								<?php elseif($io["score"] == 5): ?>
									很好<?php endif; ?>
							</td>
							<td><?php echo (date('Y-m-d H:i:s',$io["addtime"])); ?></td>
							<td>
								<?php if($io["endtime"] == 0): ?>尚未完成
								<?php else: ?>
									<?php echo (date('Y-m-d H:i:s',$io["endtime"])); endif; ?>
							</td>
							<td>
								<?php if($io["status"] == 1): ?>未开始
								<?php elseif($io["status"] == 2): ?>
									进行中
								<?php elseif($io["status"] == 3): ?>
									已结束
								<?php elseif($io["status"] == 4): ?>
									已失效<?php endif; ?>
							</td>
							<td>
								<u style="cursor: pointer;text-decoration: none" onclick="show('查看记录','<?php echo U('index');?>?needs=<?php echo ($io["needs"]); ?>&nid=<?php echo ($io["nid"]); ?>','1600','1200')">查看</u>
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
			"aaSorting": [6,"desc"],//默认第几个排序
			"aoColumnDefs": [
				{"orderable":false,"aTargets":[0,1,2,7]}// 制定列不参与排序
			],
			"searching":false,
			"bLengthChange":false,
		});

	});
	function show(title,url,w,h) {
		var account = "<?php echo (session('account')); ?>";
		if(account) {
			w = parent.document.body.clientWidth*0.95;
			h = parent.document.body.clientHeight*0.85;
			parent.layer_show(title,url,w,h);
		} else {
			alert('请先登录');
			parent.location.href = "<?php echo U('login');?>";
		}
	}
	function offNeeds(id,status) {
		if(status === '1') {
			$.ajax({
				url:"<?php echo U('Needs/offNeeds');?>",
				type:"get",
				data:{
					"id":id,
				},
				success:function (data) {
					if(data) {
						alert('关闭需求成功！');
						location.reload();
					} else {
						alert('出错了~刷新一下！');
					}
				},
				error:function () {
					alert("未知错误，请重试~");
				},
			});
		} else {
			alert('该需求无法关闭！');
		}
	}
</script>
</html>