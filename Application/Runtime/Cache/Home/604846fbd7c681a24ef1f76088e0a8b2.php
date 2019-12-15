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
    <title>护士详情</title>
    <style type="text/css">
        #content {
            margin: 15px 100px 0 200px;
        }
    </style>
</head>
<body>
    <?php if($_SESSION['role']== 'User'): ?><div style="margin-left: 15px;font-size: 20px;cursor: default;">
            <?php if($collection == true): ?><i class="Hui-iconfont" onclick="collection()"  style="cursor: pointer" title="收藏">&#xe630;</i>
                <?php elseif($collection == false): ?>
                <i class="Hui-iconfont" onclick="collection()"  style="cursor: pointer" title="收藏">&#xe61b;</i><?php endif; ?>
        </div>
        <div style="float: left;margin-left: 15px;font-size: 20px;cursor: default;">
            <i class="Hui-iconfont" onclick="show('title','<?php echo U('Chat/index');?>?uid=<?php echo (session('id')); ?>&nid=<?php echo ($nurse); ?>','0','0')"  style="cursor: pointer" title="私聊">&#xe6c5;</i>
        </div><?php endif; ?>
    <div id="content"><?php echo ($data["remark"]); ?></div>
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
    function collection() {
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
                    window.location.reload();
                } else {
                    alert('出错了~');
                }
            },
            error:function () {
                alert('未知错误！请调试！');
            }
        })
    }
    function show(title,url,w,h) {
        var account = "<?php echo (session('account')); ?>";
        if(account) {
            title = "与<?php echo ($data["name"]); ?>的私聊";
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