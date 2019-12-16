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
			<li style="margin-top: 15px">用户名：</li>
			<li style="margin-top: 16px">身份：</li>
			<li style="margin-top: 17px">性别：</li>
			<li style="margin-top: 15px">年龄：</li>
			<li style="margin-top: 15px">联系电话：</li>
			<li style="margin-top: 18px">身份证号：</li>
			<?php if($user["role"] == 'Nurse'): ?><li style="margin-top: 15px">工号：</li>
				<li style="margin-top: 17px">绩效点：</li>
				<li style="margin-top: 15px">工龄：</li>
				<li style="margin-top: 15px">现在就职医院：</li>
				<li style="margin-top: 15px">专长领域：</li>
				<li style="margin-top: 8px">自我介绍：</li><?php endif; ?>
		</ul>
	</div>
	<div style="width: 460px;float: left;margin-top: 3%;text-align: left;">
		<form style="border: none;outline: none;background-color: #E6E6E6" name="form1" method="post" action="<?php echo U('index');?>">
			<input class="input-text size-L radius" type="hidden" name="id" value="<?php echo ($user["id"]); ?>" />
			<input class="input-text size-L radius" type="hidden" name="role" value="<?php echo ($user["role"]); ?>" />
            <input class="input-text radius size-L" type="text" value="<?php echo ($user["account"]); ?>" readonly="readonly" />
            <input class="input-text radius size-L" type="text" value="<?php echo ($user["name"]); ?>" readonly="readonly" />
			<?php if($user["role"] == 'User'): ?><input class="input-text size-L radius" type="text" value="用户" readonly="readonly" />
			<?php elseif($user["role"] == 'Nurse'): ?>
				<input class="input-text size-L radius" type="text" value="护士" readonly="readonly" /><?php endif; ?>
			<?php if($user["sex"] == 1): ?><input class="input-text size-L radius" type="text" name="sex" value="男" />
				<?php elseif($user["sex"] == 2): ?>
				<input class="input-text size-L radius" type="text" name="sex" value="女" /><?php endif; ?>
			<input class="input-text size-L radius" type="text" name="age" value="<?php echo ($user["age"]); ?>周岁" />
			<input class="input-text size-L radius" type="text" name="phone" value="<?php echo ($user["phone"]); ?>" />
			<input class="input-text size-L radius" type="text" value="<?php echo ($user["card"]); ?>" readonly="readonly" />
			<?php if($user["role"] == 'Nurse'): ?><input class="input-text size-L radius" type="text" value="<?php echo ($user["id"]); ?>" readonly="readonly" />
				<input class="input-text size-L radius" type="text" value="<?php echo ($user["merits"]); ?>" readonly="readonly" />
				<input class="input-text size-L radius" type="text" name="work-year" value="<?php echo ($user["work-year"]); ?>年" />
				<input class="input-text size-L radius" type="text" name="work-add" value="<?php echo ($user["work-add"]); ?>" />
				<input class="input-text size-L radius" type="text" name="work-expertise" value="<?php echo ((isset($user["work-expertise"]) && ($user["work-expertise"] !== ""))?($user["work-expertise"]):'无'); ?>" />
				<script id="editor" name="remark" type="text/plain" style="width:450px;height:180px;background-color: #E6E6E6;border: none;"><?php echo ((isset($user["remark"]) && ($user["remark"] !== ""))?($user["remark"]):请新编辑内容); ?></script><?php endif; ?>
            <button type="button" class="btn radius size-L" onclick="layer_close()">&nbsp;关&nbsp;&nbsp;&nbsp;&nbsp;闭&nbsp;</button>
            <button type="submit" class="btn radius size-L">&nbsp;保&nbsp;&nbsp;&nbsp;&nbsp;存&nbsp;</button>
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
			toolbars: [['indent','bold','italic','underline','forecolor','fontfamily','fontsize','simpleupload','insertimage','emotion','spechars','inserttable']]
		});


	});
</script>
</html>