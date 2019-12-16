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
	<title>公告内容</title>
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
				<?php if($_SESSION['role']== 'User'): ?><thead>
						<tr class="text-c">
							<th>序号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>绩效</th>
							<th>手机</th>
							<th>自我介绍</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
								<td><?php echo ($vo["id"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td>
									<?php if($vo["sex"] == 1): ?>男
										<?php else: ?>
										女<?php endif; ?>
								</td>
								<td><?php echo ($vo["merits"]); ?></td>
								<td><?php echo ($vo["phone"]); ?></td>
								<td style="cursor: pointer" onclick="show('护士详情','<?php echo U('info');?>?table=Nurse&id=<?php echo ($vo["id"]); ?>&field=remark','1600','1200')">查看详情</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				<?php else: ?>
					<thead>
						<tr class="text-c">
							<th>序号</th>
							<th>标题</th>
							<th>发布人</th>
							<th>病症</th>
							<th>报酬</th>
							<th>工时</th>
							<th>失效时间</th>
							<th>需求详情</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
								<td><?php echo ($vo["id"]); ?></td>
								<td><?php echo ($vo["title"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["disease"]); ?></td>
								<td><?php echo ($vo["reward"]); ?></td>
								<td><?php echo ($vo["worktime"]); ?></td>
								<td><?php echo (date('Y-m-d H:i:s',$vo["endtime"])); ?></td>
<!--								<td style="cursor: pointer" onclick="show('需求详情','<?php echo U('info');?>?table=Needs&id=<?php echo ($vo["id"]); ?>&field=needs','1600','1200')">查看详情</td>-->
								<td style="cursor: pointer" onclick="show('需求详情','<?php echo U('Needs/index');?>?id=<?php echo ($vo["id"]); ?>','1000','0')">查看详情</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody><?php endif; ?>
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
<script type="text/javascript">
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
</script>
</html>