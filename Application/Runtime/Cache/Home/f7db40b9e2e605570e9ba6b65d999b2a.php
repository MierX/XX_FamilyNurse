<?php if (!defined('THINK_PATH')) exit();?>﻿<html lang="en">
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
    <script type="text/javascript" src="../../../../Public/h-ui/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>私聊信息</title>
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
        body::-webkit-scrollbar {
            width: 0;
            height: 0;
            display: none;
        }
        span > p {
            width: 140px!important;
            text-align: left;
        }
    </style>
</head>
<body>
    <div id="chatList">
        <?php if(is_array($chats)): $i = 0; $__LIST__ = $chats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i; if($co["time"] != 1): ?><div style="text-align: center;font-size: 6px;margin-top: 3px">
                    <div><?php echo ($co["time"]); ?></div>
                </div><?php endif; ?>
            <?php if(($co["author"]) == $_SESSION['id']): if(($co["role"]) == $_SESSION['role']): ?><div style="text-align: right;">
                        <div style="background-color: #9eea6a;width: auto;display: inline-block!important;color: #232323;margin-right: 30px;padding: 10px 15px 0 15px;margin-bottom: 3px"><span><?php echo ($co["content"]); ?></span></div>
                    </div>
                <?php else: ?>
                    <div style="text-align: left;">
                        <div style="background-color: #999999;width: auto;display: inline-block!important;color: #232323;margin-left: 30px;padding: 10px 15px 0 15px;margin-bottom: 3px"><span><?php echo ($co["content"]); ?></span></div>
                    </div><?php endif; ?>
            <?php else: ?>
                <div style="text-align: left;">
                    <div style="background-color: #f8f8f8;width: auto;display: inline-block!important;color: #232323;margin-left: 30px;padding: 10px 15px 0 15px;margin-bottom: 3px"><span><?php echo ($co["content"]); ?></span></div>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
<script>
    setTimeout(function () {
        ($('#chatList').children("div:last-child")[0]).scrollIntoView();
    },100);
</script>
</html>