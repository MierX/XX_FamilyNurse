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
    <title>详情</title>
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
            left: 0;
            overflow-x: hidden;
            overflow-y: scroll;
        }
        /*body::-webkit-scrollbar {*/
        /*    display: none;*/
        /*}*/
        #down ul > li {
            float: left;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="notice">
        <div id="bow1" style="width: 100%;">
            <div id="content">
                <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$io): $mod = ($i % 2 );++$i;?><p><?php echo (date("Y-m-d",$io["addtime"])); ?>： <?php echo ($io["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
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
    function collection() {
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
    function apply() {
        var apply = confirm('您确定要申请此需求吗？');
        if(apply) {
            $.ajax({
                url:"<?php echo U('checkStatus');?>",
                type:"get",
                data:{
                    'id':"<?php echo ($needs); ?>",
                    "nid":"<?php echo (session('id')); ?>",
                },
                success:function (data) {
                    if(data) {
                        alert("申请成功，请耐心等待用户的选择！");
                    } else {
                        alert("您已经申请过该需求，不能重复申请！");
                    }
                },
                error:function () {
                    alert('未知错误，请重试~');
                },
            });
        }
    }
    function accept(nid) {
        var accept = confirm("您确定接受这位护士的医护申请吗？");
        if(accept) {
            $.ajax({
                url:"<?php echo U('accept');?>",
                type:"get",
                data:{
                    "needs":"<?php echo ($needs); ?>",
                    "nurse":nid,
                    "user":"<?php echo (session('id')); ?>",
                },
                success:function (data) {
                    if(data) {
                        alert("接收成功！");
                        parent.location.reload();
                    } else {
                        alert("接受失败！");
                    }
                },
                error:function () {
                    alert('未知错误，请重试~');
                },
            });
        }
    }
</script>
</html>