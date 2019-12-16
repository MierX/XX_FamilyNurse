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
	<title></title>
	<style type="text/css">
		* {
			border: 0;
			padding: 0;
			margin: 0;
			text-decoration: none;
			background-color: #E6E6E6!important;
		}
		#content {
			width: 50%;
			margin-left: 25%;
		}
		input {
			text-align: left!important;
			width: 500px!important;
			height: 100% !important;
			border: none!important;
			line-height: 1!important;
		}
	</style>
</head>
<body style="padding-top: 1%">
	<div id="content">
		<form method="post" action="<?php echo U('edit');?>">
			<input type="hidden" class="input-text" name="uid" value="<?php echo ($user["id"]); ?>" />
			<ul>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="标题：" readonly="readonly" />
					<input id="input-title" type="text" class="input-text radius size-M" name="title" value="" placeholder="请输入标题，尽量简短直接" required="required" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="发布人：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo ($user["name"]); ?>" readonly="readonly" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="性别：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo ($user["sex"]); ?>" readonly="readonly" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="年龄：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo ($user["age"]); ?>周岁" readonly="readonly" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="联系电话：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo ($user["phone"]); ?>" readonly="readonly" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="发布时间：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo (date('Y-m-d H:i:s',$addtime)); ?>" readonly="readonly" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="失效时间：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" value="<?php echo (date('Y-m-d H:i:s',$endtime)); ?>" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="病症：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" name="disease" value="" placeholder="请简要填写需要护理的病症" required="required" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="报酬（小时）：" readonly="readonly" />
					<input type="number" class="input-text radius size-M" name="reward" value="" placeholder="请填写单时报酬" required="required" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="预计总工时（小时）：" readonly="readonly" />
					<input type="text" class="input-text radius size-M" name="worktime" value="" placeholder="请填写总工时" required="required" />
				</li>
				<li>
					<input type="text" class="btn radius" style="width: 200px!important;cursor: default;text-align: right!important;" value="请填写具体需求内容：" readonly="readonly" />
					<script id="editor" name="needs" type="text/plain" style="width:600px;height:300px;background-color: #E6E6E6;border: none;margin-left: 200px;margin-top: -20px;"><?php echo htmlspecialchars_decode($dfContent);?></script>
				</li>
				<li style="margin-top: 35px;margin-left: 25%">
					<button type="submit" class="radius btn" style="border: 1px black solid">&nbsp;&nbsp;&nbsp;&nbsp;发&nbsp;&nbsp;布&nbsp;&nbsp;&nbsp;&nbsp;</button>
					<button type="button" class="btn radius" onclick="layer_close()" style="margin-left: 25%;border: 1px black solid">&nbsp;&nbsp;&nbsp;&nbsp;关&nbsp;&nbsp;闭&nbsp;&nbsp;&nbsp;&nbsp;</button>
				</li>
			</ul>
		</form>
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
	$(function(){
		$('.skin-minimal input').iCheck({
			checkboxClass: 'icheckbox-blue',
			radioClass: 'iradio-blue',
			increaseArea: '20%'
		});
		$list = $("#fileList"),
				$btn = $("#btn-star"),
				state = "pending",
				uploader;
		var uploader = WebUploader.create({
			auto: true,
			swf: '../../../../Public/h-ui/lib/webuploader/0.1.5/Uploader.swf',
			// 文件接收服务端。
			server: 'fileupload.php',
			// 选择文件的按钮。可选。
			// 内部根据当前运行是创建，可能是input元素，也可能是flash.
			pick: '#filePicker',
			// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
			resize: false,
			// 只允许选择图片文件。
			accept: {
				title: 'Images',
				extensions: 'gif,jpg,jpeg,bmp,png',
				mimeTypes: 'image/*'
			}
		});
		uploader.on( 'fileQueued', function( file ) {
			var $li = $(
					'<div id="' + file.id + '" class="item">' +
					'<div class="pic-box"><img></div>'+
					'<div class="info">' + file.name + '</div>' +
					'<p class="state">等待上传...</p>'+
					'</div>'
					),
					$img = $li.find('img');
			$list.append( $li );
			// 创建缩略图
			// 如果为非图片文件，可以不用调用此方法。
			// thumbnailWidth x thumbnailHeight 为 100 x 100
			uploader.makeThumb( file, function( error, src ) {
				if ( error ) {
					$img.replaceWith('<span>不能预览</span>');
					return;
				}
				$img.attr( 'src', src );
			}, thumbnailWidth, thumbnailHeight );
		});
		// 文件上传过程中创建进度条实时显示。
		uploader.on( 'uploadProgress', function( file, percentage ) {
			var $li = $( '#'+file.id ),
					$percent = $li.find('.progress-box .sr-only');
			// 避免重复创建
			if ( !$percent.length ) {
				$percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
			}
			$li.find(".state").text("上传中");
			$percent.css( 'width', percentage * 100 + '%' );
		});
		// 文件上传成功，给item添加成功class, 用样式标记上传成功。
		uploader.on( 'uploadSuccess', function( file ) {
			$( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
		});
		// 文件上传失败，显示上传出错。
		uploader.on( 'uploadError', function( file ) {
			$( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
		});
		// 完成上传完了，成功或者失败，先删除进度条。
		uploader.on( 'uploadComplete', function( file ) {
			$( '#'+file.id ).find('.progress-box').fadeOut();
		});
		uploader.on('all', function (type) {
			if (type === 'startUpload') {
				state = 'uploading';
			} else if (type === 'stopUpload') {
				state = 'paused';
			} else if (type === 'uploadFinished') {
				state = 'done';
			}

			if (state === 'uploading') {
				$btn.text('暂停上传');
			} else {
				$btn.text('开始上传');
			}
		});
		$btn.on('click', function () {
			if (state === 'uploading') {
				uploader.stop();
			} else {
				uploader.upload();
			}
		});
		var ue = UE.getEditor('editor',{
			toolbars: [['indent','bold','italic','underline','forecolor','fontfamily','fontsize','simpleupload','insertimage','emotion','spechars','inserttable']],
		});
	});
</script>
</html>