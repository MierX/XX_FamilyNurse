<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="Bookmark" href="../../../../Public/h-ui/favicon.ico" >
    <link rel="Shortcut Icon" href="../../../../Public/h-ui/favicon.ico" />
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
    <title>后台</title>
</head>
<body>
	<aside class="Hui-aside" style="margin-top: -40px">
		<div class="menu_dropdown bk_2">
			<dl>
				<dt>
					<i class="Hui-iconfont">&#xe62c;</i>
					用户管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li>
							<a data-href="<?php echo U('User/index');?>?table=User" data-title="用户列表" href="javascript:void(0)">用户列表</a>
						</li>
						<li>
							<a data-href="<?php echo U('User/index');?>?table=Nurse" data-title="护士列表" href="javascript:void(0)">护士列表</a>
						</li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>
					<i class="Hui-iconfont">&#xe63e;</i>
					公告管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li>
							<a data-href="<?php echo U('Notice/index');?>?table=Notice" data-title="公告列表" href="javascript:void(0)">公告列表</a>
						</li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>
					<i class="Hui-iconfont">&#xe639;</i>
					需求管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li>
							<a data-href="<?php echo U('Needs/index');?>?table=Needs" data-title="需求列表" href="javascript:void(0)">需求列表</a>
						</li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>
					<i class="Hui-iconfont">&#xe639;</i>
					记录管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li>
							<a data-href="<?php echo U('Accept/index');?>?table=Accept" data-title="记录列表" href="javascript:void(0)">记录列表</a>
						</li>
					</ul>
				</dd>
			</dl>
		</div>
	</aside>
	<div class="dislpayArrow hidden-xs">
		<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
	</div>
	<section class="Hui-article-box" style="margin-top: -40px">
		<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
			<div class="Hui-tabNav-wp">
				<ul id="min_title_list" class="acrossTab cl">
					<li class="active">
						<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					</li>
				</ul>
			</div>
			<div class="Hui-tabNav-more btn-group">
				<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
					<i class="Hui-iconfont">&#xe6d4;</i>
				</a>
				<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
					<i class="Hui-iconfont">&#xe6d7;</i>
				</a>
			</div>
		</div>
		<div id="iframe_box" class="Hui-article">
			<div class="show_iframe">
				<div style="display:none" class="loading"></div>
				<iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
			</div>
		</div>
	</section>
	<div class="contextMenu" id="Huiadminmenu">
		<ul>
			<li id="closethis">关闭当前 </li>
			<li id="closeall">关闭全部 </li>
		</ul>
	</div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
</html>