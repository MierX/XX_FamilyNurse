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
    <script type="text/javascript" src="../../../../Public/h-ui/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>公告</title>
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
            display: none;
        }
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
            <table class="table table-border table-bordered table-hover table-bg table-sort" style="border: none!important;">
                <thead>
                    <tr class="text-c">
                        <th style="background-color: #ffffff;border: none!important;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($Needs)): $i = 0; $__LIST__ = $Needs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c" style="background-color: #ffffff">
                            <td style="height: 185px;margin-top: 60px;border: none;">
                                <div id="content1" style="height: 90%;width: 100%;cursor: pointer" onclick="show('需求详情','<?php echo U('Needs/index');?>?id=<?php echo ($vo["id"]); ?>','1000','0')">
                                    <div id="up1" style="text-align: left">
                                        <u style="font-size: 18px;font-weight: 600;line-height: 1.6;color: #1A1A1A" onmousemove="this.style.color='blue'" onmouseout="this.style.color = '#1A1A1A'"><?php echo ($vo["title"]); ?></u>
                                    </div>
                                    <div id="mid1" style="margin-top: 10px;padding-left: 5px;height: 150px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;text-align: left;display: -webkit-box;-webkit-box-orient: vertical;word-wrap: break-word;">
                                        <u style="font-size: 16px;line-height: 1.67;"><?php echo ($vo["needs"]); ?></u>
                                    </div>
                                    <div id="down">
                                        <ul>
                                            <li>发布者：<?php echo ($vo["name"]); ?></li>
                                            <li>性别：<?php echo ($vo["sex"]); ?></li>
                                            <li>报酬：<?php echo ($vo["reward"]); ?></li>
                                            <li>预计工时：<?php echo ($vo["worktime"]); ?></li>
                                        </ul>
                                        <ul>
                                            <li>病症：<?php echo ((isset($vo["disease"]) && ($vo["disease"] !== ""))?($vo["disease"]):未填写); ?></li>
                                            <li>发布时间：<?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></li>
                                            <li>失效时间：<?php echo (date('Y-m-d H:i:s',$vo["endtime"])); ?></li>
                                        </ul>
                                    </div>
                                </div>
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
<script type="text/javascript" src="../../../../Public/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function(){
        $('.table-sort').dataTable({
            "searching":false,
            "bLengthChange":false,
            'bSort':false,
            "bPaginate":false,
            "bInfo":false,
        })
    });

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
</script>
</html>