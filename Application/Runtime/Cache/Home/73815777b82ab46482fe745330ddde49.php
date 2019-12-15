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
    <?php if($_SESSION['role']== 'Nurse'): ?><div style="margin-left: 15px;font-size: 20px;cursor: default;">
            <?php if($collection == true): ?><i class="Hui-iconfont" onclick="collection()"  style="cursor: pointer" title="收藏">&#xe630;</i>
            <?php elseif($collection == false): ?>
                <i class="Hui-iconfont" onclick="collection()"  style="cursor: pointer" title="收藏">&#xe61b;</i><?php endif; ?>
        </div>
        <div style="float: left;margin-left: 15px;font-size: 20px;cursor: default;">
            <i class="Hui-iconfont" onclick="show('title','<?php echo U('Chat/index');?>?nid=<?php echo (session('id')); ?>&uid=<?php echo ($data["uid"]); ?>','0','0')"  style="cursor: pointer" title="私聊">&#xe6c5;</i>
        </div>
        <div style="float: left;margin-left: 15px;font-size: 20px;cursor: default;">
            <i class="Hui-iconfont" onclick="apply()"  style="cursor: pointer" title="申请">&#xe717;</i>
        </div>
    <?php else: ?>
        <?php if(($data["uid"]) == $_SESSION['id']): ?><div style="margin-left: 15px;font-size: 16px;">
                申请列表：
                <ul style="font-size: 14px">
                    <?php if(is_array($applyer)): $i = 0; $__LIST__ = $applyer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ao): $mod = ($i % 2 );++$i;?><li>
                            <?php echo ($ao["name"]); ?>
                            <u style="cursor: pointer" onclick="accept('<?php echo ($ao["nid"]); ?>')">接受</u>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; endif; ?>
    <div id="content"><?php echo ($data["needs"]); ?></div>
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