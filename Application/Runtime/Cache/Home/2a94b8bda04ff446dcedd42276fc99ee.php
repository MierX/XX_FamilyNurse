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
			background-color: #E6E6E6;
			background: url("../../../../Public/img/true.jpg") no-repeat;
			background-size: 100%;
		}
		#content {
			width: 100%;
			position: static;
		}
		#top {
            float: left;
			width: 100%;
			height: 5%;
			padding-left: 18%;
			border-bottom: 1px #E6E6E6 solid;
			background-color: #ffffff;
			position: fixed;
			z-index: 99;
		}
		#top ul > li {
			float: left;
			margin-left: 2%;
			margin-top: 1%;
			font-size: 18px;
		}
		#top ul > li > input {
			background-color: #E6E6E6;
			border: none;
		}
		#top ul > li > #search {
			background-color: #E6E6E6;
			border: none;
		}
		#body {
			width: 59.5%;
            height: 100%;
			margin-left: 20%;
            position: fixed;
		}
        #left {
            float: left;
			width: 68.5%;
			border: 1px #E6E6E6 solid;
			background-color: #ffffff;
			margin-top: 6%;
		}
        #right {
			float: right;
			width: 29%;
            margin-top: 6%;
		}
		#right_1 {
			width: 100%;
			height: 195px;
			padding-top: 7%;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
        #ul_1 > li {
            float: left;
            margin-left: 19%;
            font-size: 24px;
        }
		#ul_2 > li {
			float: left;
			font-size: 20px;
			margin-left: 13%;
		}
		#right2 {
			width: 100%;
			height: 240px;
			margin-top: 4.5%;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
		#ul_3 > li {
			margin-left: 5%;
			margin-top: 3.5%;
			font-size: 16px;
		}
		#right3 {
			width: 100%;
			height: 355px;
			margin-top: 4.5%;
			background-color: #ffffff;
			border: 1px #E6E6E6 solid;
		}
		#collection1 {
			text-align: center;
		}
		#collection2 {
			text-align: center;
		}
		.my-skin {
			text-align: center;
		}
		.my-skin .layui-layer-btn {
			text-align: center;
		}
		.my-skin .layui-layer-btn a {
			background-color: #3385ff;
			color: #dff3ff;
		}
		.my-skin .layui-layer-content a {
			height: 0;
		}
	</style>
</head>
<body>
	<div id="content">
		<div id="top">
			<ul>
				<li style="margin-top: 0">
					<a href="<?php echo U('index');?>" style="font-size: 32px;">XX家庭护士网</a>
<!--					<a href="<?php echo U('index');?>" style="font-size: 32px;">XXXXXXXXXX</a>-->
				</li>
				<li>
					<a id="needs_tag" href="<?php echo U('needsList');?>" target="targetText" onclick="changerTag(this.href)">患者需求</a>
				</li>
				<li>
					<a id="nurse_tag" href="<?php echo U('nurseList');?>" target="targetText" onclick="changerTag(this.href)">驻站护士</a>
				</li>
				<li>
					<a id="notice_tag" href="<?php echo U('noticeList');?>" target="targetText" onclick="changerTag(this.href)">公告</a>
				</li>
				<li style="background-color: #E6E6E6;margin-top: 0.8%;margin-left: 3.5%;">
					<input id="keyword" type="text" class="input-text" style="width: 180px;" name="keyword" value="" placeholder="请输入需求标题" />
					<a id="search" href="javascript:void(0);" target="targetText" class="btn radius" onclick="seaList()">搜索</a>
				</li>
				<li style="margin-left: 14%">
					<i class="Hui-iconfont">
<!--						<a href="javascript:void(0);" onClick="show('个人中心','<?php echo U('User/index');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0')" title="<?php echo ($user["name"]); ?>">&#xe625;</a>-->
						<a href="javascript:void(0);" onClick="self()" title="<?php echo ($user["name"]); ?>">&#xe625;</a>
					</i>
				</li>
				<li>
					<?php if(empty($user["name"])): ?><i class="Hui-iconfont">
							<a href="<?php echo U('login');?>" title="登陆">&#xe645;</a>
						</i>
					<?php else: ?>
						<i class="Hui-iconfont">
							<a href="<?php echo U('logout');?>" title="注销">&#xe634;</a>
						</i><?php endif; ?>
				</li>
			</ul>
		</div>
		<div id="body">
            <div id="left" class="show_iframe">
                <iframe id="list" scrolling="auto" frameborder="0" name="targetText" src="<?php echo U('needsList');?>"></iframe>
            </div>
            <div id="right">
                <div id="right_1">
                    <ul id="ul_1">
                        <li>
                            <?php if($user["role"] == 'Nurse'): ?><i class="Hui-iconfont">
                                    <a href="javascript:void(0);" onClick="alert('非普通用户无法使用该功能！');">&#xe627;</a>
                                </i>
                            <?php else: ?>
                                <i class="Hui-iconfont">
                                    <a href="javascript:void(0);" onClick="chooseNeeds()">&#xe60c;</a>
                                </i><?php endif; ?>
                        </li>
                        <li>
                            <i class="Hui-iconfont">
                                <a href="javascript:void(0);" onclick="show('我的信箱','<?php echo U('Chat/list');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0');">&#xe68a;</a>
                            </i>
                        </li>
                        <li>
							<i class="Hui-iconfont">
								<a href="javascript:void(0);" onClick="show('我的记录','<?php echo U('Record/list');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0');">&#xe72d;</a>
							</i>
                        </li>
                    </ul>
                    <ul id="ul_2">
						<li>看需求</li>
                        <li style="margin-left: 6.5%">看信箱</li>
                        <li style="margin-left: 7%">查记录</li>
                    </ul>
                    <ul style="margin-top: 38.5%">
                        <li style="margin-left: 5%;font-size: 14px">
                            <i class="Hui-iconfont" style="color: red">&#xe600;</i>
                            <a href="#">查看医生</a>
                        </li>
                        <li>
                            <Hr style="width: 90%; margin-left: 5%; background-color: #E6E6E6;margin-top: 10px;margin-bottom: 10px;" size="4">
                        </li>
                        <li style="margin-left: 5%;font-size: 14px">
                            <i class="Hui-iconfont">&#xe62c;</i>
                            <a href="javascript:void(0);" onClick="show('个人中心','<?php echo U('User/index');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0')">个人中心</a>
                        </li>
                    </ul>
                </div>
				<div id="right2">
					<ul id="ul_3">
						<li style="margin-top: 8%;">姓名：<?php echo ((isset($user["name"]) && ($user["name"] !== ""))?($user["name"]):'未登录'); ?></li>
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
					<p style="margin-top: 10px;margin-left: 15px;cursor: default">
						<i class="Hui-iconfont" style="font-size: 18px;cursor: pointer;" onClick="show('收藏列表','<?php echo U('Collection/index');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0')">&#xe69d;&nbsp;&nbsp;我的收藏</i>
						<input type="text" class="input-text" style="float: right;width: 25px;height: 25px;margin-right: 20px;margin-top: 2px;background-color: #E6E6E6;border: none;text-align: center;cursor: default" value="<?php echo ((isset($collection_count) && ($collection_count !== ""))?($collection_count):0); ?>" readonly="readonly" />
					</p>
					<hr style="width: 90%;background-color: #E6E6E6;margin-left: 5%;" size="5" />
					<?php if(!empty($_SESSION['account'])): if($_SESSION['role']== 'User'): ?><table id="collection1">
								<tr>
									<td>工号</td>
									<td>护士</td>
									<td>绩效</td>
									<td>电话</td>
								</tr>
								<?php if(is_array($collection)): $i = 0; $__LIST__ = $collection;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($co["id"]); ?></td>
										<td><?php echo ($co["name"]); ?></td>
										<td><?php echo ($co["merits"]); ?></td>
										<td><?php echo ($co["phone"]); ?></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						<?php else: ?>
							<table id="collection2">
								<tr>
									<td>标题</td>
									<td>病症</td>
									<td>报酬</td>
									<td>工时</td>
									<td>截止时间</td>
								</tr>
								<?php if(is_array($collection)): $i = 0; $__LIST__ = $collection;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo (substr($co["title"],3,12)); ?></td>
										<td><?php echo ($co["disease"]); ?></td>
										<td><?php echo ($co["reward"]); ?></td>
										<td><?php echo ($co["worktime"]); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$co["endtime"])); ?></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table><?php endif; ?>
					<?php else: ?>
						&nbsp;&nbsp;&nbsp;&nbsp;未登录<?php endif; ?>
				</div>
            </div>
		</div>
	</div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	var tag = "<?php echo U('noticeList');?>";

	function changerTag(href) {
		tag = href;
		if(tag.indexOf("<?php echo U('noticeList');?>") !== -1) {
			document.getElementById("keyword").value = '';
			document.getElementById("keyword").placeholder = '请输入公告标题';
		} else if(tag.indexOf("<?php echo U('needsList');?>") !== -1) {
			document.getElementById("keyword").value = '';
			document.getElementById("keyword").placeholder = '请输入需求标题';
		} else if(tag.indexOf("<?php echo U('nurseList');?>") !== -1) {
			document.getElementById("keyword").value = '';
			document.getElementById("keyword").placeholder = '请输入护士名称';
		}
	}
	
	function self() {
		var role = "<?php echo ($user["role"]); ?>";
		console.log(role);
		layer.open({
			title: false,
			content:false,
			btn: ['个人信息','发布需求','查看需求','查看信箱','收藏列表','查看记录'],
			btnAlign:'c',
			closeBtn:false,
			shadow:0.3,
			area: ['100px','150px'],
			shadeClose: true,
			skin:'my-skin',
			btn1: function(index, layero){
				show('个人中心','<?php echo U('User/index');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0');
				return false;
			},
			btn2: function(index, layero){
				if(role == 'User') {
					show('发布需求','<?php echo U('Needs/edit');?>?id=<?php echo ($user["id"]); ?>','0','0');
					return false;
				} else {
					alert("请使用普通用户身份！");
				}
			},
			btn3: function(index, layero){
				if(role == 'User') {
					show('个人需求列表','<?php echo U('User/myNeeds');?>?id=<?php echo ($user["id"]); ?>','0','0');
					return false;
				} else {
					alert("请使用普通用户身份！");
				}
			},
			btn4: function(index, layero){
				show('我的信箱','<?php echo U('Chat/list');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0');
				return false;
			},
			btn5: function(index, layero){
				show('收藏列表','<?php echo U('Collection/index');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0')
				return false;
			},
			btn6: function(index, layero){
				show('我的记录','<?php echo U('Record/list');?>?id=<?php echo ($user["id"]); ?>&role=<?php echo ($user["role"]); ?>','0','0');
				return false;
			},
			cancel: function(){
			}
		});
	}

	function seaList() {
		var keyword = document.getElementById("keyword").value;
		if(keyword) {
			if(tag.indexOf("<?php echo U('noticeList');?>") !== -1) {
				document.getElementById("search").href = "<?php echo U('noticeList');?>?keyword="+keyword;
			} else if(tag.indexOf("<?php echo U('needsList');?>") !== -1) {
				document.getElementById("search").href = "<?php echo U('needsList');?>?keyword="+keyword;
			} else if(tag.indexOf("<?php echo U('nurseList');?>") !== -1) {
				document.getElementById("search").href = "<?php echo U('nurseList');?>?keyword="+keyword;
			}
		} else {
			document.getElementById("search").href = tag;
		}
	}

	function show(title,url,w,h) {
		var account = "<?php echo (session('account')); ?>";
		if(account) {
			if(w == 0) w = parent.document.body.clientWidth*0.95;
			if(h == 0) h = parent.document.body.clientHeight*0.85;
			parent.layer_show(title,url,w,h);
		} else {
			alert('请先登录');
			parent.location.href = "<?php echo U('login');?>";
		}
	}
	function chooseNeeds() {
		var account = "<?php echo (session('account')); ?>";
		if(!account) {
			alert('请先登录');
			parent.location.href = "<?php echo U('login');?>";
		}
		$.ajax({
			url:"<?php echo U('User/myNeeds');?>",
			type:"get",
			data:{
				"check":1,
				"id":"<?php echo ($user["id"]); ?>",
			},
			success:function (data) {
				if(data) {
					alert("您当前没有有效需求，先去发布需求吧！");
					show('发布需求','<?php echo U('Needs/edit');?>?id=<?php echo ($user["id"]); ?>','0','0');
				} else {
					checkNeeds();
				}
			},
			error:function () {
				alert('未知错误！请调试！');
			}
		});
	}
	function checkNeeds() {
		layer.confirm('请选择', {
			btn: ['看需求','发需求']
		}, function(){
			show('个人需求列表','<?php echo U('User/myNeeds');?>?id=<?php echo ($user["id"]); ?>','0','0');
		}, function(){
			show('发布需求','<?php echo U('Needs/edit');?>?id=<?php echo ($user["id"]); ?>','0','0');
		});
	}
	function checkNurse() {
		$.ajax({
			url:"<?php echo U('Nurse/myNeeds');?>",
			type:"get",
			data:{
				"id":"<?php echo ($user["id"]); ?>",
			},
			success:function (data) {
				if(data) {
					show('查看需求','<?php echo U('Nurse/myNeeds');?>?id=<?php echo ($user["id"]); ?>&list=1','0','0')
				} else {
					alert('您还没有医护记录');
				}
			},
			error:function () {
				alert('未知错误！请调试！');
			},
		});
	}
</script>
</html>