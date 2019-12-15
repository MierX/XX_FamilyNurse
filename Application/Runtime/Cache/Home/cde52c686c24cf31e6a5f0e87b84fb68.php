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
    <title>查看记录</title>
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
        }
        #body {
            width: 53%;
            height: 100%;
            margin-left: 23.5%;
            position: fixed;
        }
        #left {
            float: left;
            width: 68%;
            height: 100%;
            border: 1px #E6E6E6 solid;
        }
        #right {
            float: right;
            width: 29%;
        }
        .right_1 {
            width: 100%;
            height: 195px;
            border: 1px #E6E6E6 solid;
        }
        .ul_3 > li {
            margin-left: 5%;
            margin-top: 1%;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div id="body">
        <div id="left">
            <div id="top">
                <iframe scrolling="auto" frameborder="0" name="targetText" src="<?php echo U('content');?>?id=<?php echo ($info["id"]); ?>" style="margin-top: 3%;height: 450px"></iframe>
            </div>
            <p style="margin-top: 1%">医嘱记录：</p>
            <div id="bottom">
                <iframe scrolling="auto" frameborder="0" name="targetText" src="<?php echo U('record');?>?id=<?php echo ($info["id"]); ?>" ></iframe>
            </div>
        </div>
        <div id="right">
            <div class="right_1">
                <ul class="ul_3">
                    <li style="margin-top: 8%;">用户信息</li>
                    <li style="margin-top: 1%;">姓名：<?php echo ($info["u_name"]); ?></li>
                    <?php if($info["u_sex"] == 1): ?><li>性别：男</li>
                        <?php elseif($info["u_sex"] == 2): ?>
                        <li>性别：女</li><?php endif; ?>
                    <li>年龄：<?php echo ($info["u_age"]); ?></li>
                    <li>手机：<?php echo ($info["u_phone"]); ?></li>
                </ul>
                <ul class="ul_3">
                    <li style="margin-top: 8%;">护士信息</li>
                    <li style="margin-top: 1%;">姓名：<?php echo ($info["n_name"]); ?></li>
                    <?php if($info["n_sex"] == 1): ?><li>性别：男</li>
                        <?php elseif($info["n_sex"] == 2): ?>
                        <li>性别：女</li><?php endif; ?>
                    <li>工龄：<?php echo ($info["work-year"]); ?></li>
                    <li>就职医院：<?php echo ($info["work-add"]); ?></li>
                    <li>专治领域：<?php echo ($info["work-expertise"]); ?></li>
                    <li>绩效：<?php echo ($info["merits"]); ?></li>
                </ul>
                <ul class="ul_3">
                    <li style="margin-top: 8%;">需求信息</li>
                    <li style="margin-top: 1%;">病症：<?php echo ($info["disease"]); ?></li>
                    <li>报酬：<?php echo ($info["reward"]); ?></li>
                    <li>工时：<?php echo ($info["worktime"]); ?></li>
                    <li>
                        状态：
                        <?php if($info["status"] == 1): ?>未开始
                        <?php elseif($info["status"] == 2): ?>
                            已开始
                        <?php elseif($info["status"] == 3): ?>
                            已结束
                        <?php else: ?>
                            已失效<?php endif; ?>
                    </li>
                </ul>
                <ul class="ul_3">
                    <li style="margin-top: 8%;">
                        <?php if($info["status"] == 2): if($_SESSION['role']== User): ?><p>结束本次医疗：<span id="score"></span></p>
                                <button id="star1" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStar(1)" onmouseout="changerNullStar(1)" onclick="saveScore(1)">☆</button>
                                <button id="star2" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStar(2)" onmouseout="changerNullStar(2)" onclick="saveScore(2)">☆</button>
                                <button id="star3" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStar(3)" onmouseout="changerNullStar(3)" onclick="saveScore(3)">☆</button>
                                <button id="star4" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStar(4)" onmouseout="changerNullStar(4)" onclick="saveScore(4)">☆</button>
                                <button id="star5" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStar(5)" onmouseout="changerNullStar(5)" onclick="saveScore(5)">☆</button>
                            <?php else: ?>
                                <input id="record" type="text" class="input-text size-S radius" value="" placeholder="请输入医嘱" style="width: 80%" />
                                <button type="button" class="btn radius size-S" onclick="setRecord()">保存</button><?php endif; ?>
                        <?php elseif($info["status"] == 3): ?>
                            <?php if($_SESSION['role']== Nurse): if(($info["ntou"]) == "0"): ?><p>给这位用户一个评价吧：<span id="score_nurse"></span></p>
                                    <button id="star_nurse1" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStarNurse(1)" onmouseout="changerNullStarNurse(1)" onclick="saveScoreNurse(1)">☆</button>
                                    <button id="star_nurse2" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStarNurse(2)" onmouseout="changerNullStarNurse(2)" onclick="saveScoreNurse(2)">☆</button>
                                    <button id="star_nurse3" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStarNurse(3)" onmouseout="changerNullStarNurse(3)" onclick="saveScoreNurse(3)">☆</button>
                                    <button id="star_nurse4" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStarNurse(4)" onmouseout="changerNullStarNurse(4)" onclick="saveScoreNurse(4)">☆</button>
                                    <button id="star_nurse5" type="button" class="btn radius size-L" style="background-color: #E6E6E6" onmouseover="changerStarNurse(5)" onmouseout="changerNullStarNurse(5)" onclick="saveScoreNurse(5)">☆</button><?php endif; endif; endif; ?>
                    </li>
                </ul>
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
    function changerStar(id) {
        for(var i = 1; i <= id; i++) {
            document.getElementById('star'+i).innerHTML = "★";
        }
        if(id === 1) document.getElementById('score').innerText = "很差";
        if(id === 2) document.getElementById('score').innerText = "差";
        if(id === 3) document.getElementById('score').innerText = "一般";
        if(id === 4) document.getElementById('score').innerText = "好";
        if(id === 5) document.getElementById('score').innerText = "优秀";
    }
    function changerNullStar(id) {
        for(var i = 1; i <= id; i++) {
            document.getElementById('star'+i).innerHTML = "☆";
        }
        document.getElementById('score').innerText = "";
    }
    function saveScore(value) {
        if(value) {
            $.ajax({
                url:"<?php echo U('saveScore');?>",
                type:"get",
                data:{
                    "id":"<?php echo ($info["id"]); ?>",
                    "nid":"<?php echo ($info["nid"]); ?>",
                    "score":value,
                },
                success:function (data) {
                    if(data) {
                        location.reload();
                    }
                }
            });
        }
    }
    function changerStarNurse(id) {
        for(var i = 1; i <= id; i++) {
            document.getElementById('star_nurse'+i).innerHTML = "★";
        }
        if(id === 1) document.getElementById('score_nurse').innerText = "很差";
        if(id === 2) document.getElementById('score_nurse').innerText = "差";
        if(id === 3) document.getElementById('score_nurse').innerText = "一般";
        if(id === 4) document.getElementById('score_nurse').innerText = "好";
        if(id === 5) document.getElementById('score_nurse').innerText = "优秀";
    }
    function changerNullStarNurse(id) {
        for(var i = 1; i <= id; i++) {
            document.getElementById('star_nurse'+i).innerHTML = "☆";
        }
        document.getElementById('score_nurse').innerText = "";
    }
    function saveScoreNurse(value) {
        if(value) {
            $.ajax({
                url:"<?php echo U('saveScoreNurse');?>",
                type:"get",
                data:{
                    "id":"<?php echo ($info["id"]); ?>",
                    "uid":"<?php echo ($info["uid"]); ?>",
                    "score":value,
                },
                success:function (data) {
                    if(data) {
                        location.reload();
                    }
                }
            });
        }
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
    function setRecord() {
        var value = document.getElementById('record').value;
        $.ajax({
            url:"<?php echo U('save');?>",
            type:"get",
            data:{
                "id":"<?php echo ($info["id"]); ?>",
                "value":value,
            },
            success:function (data) {
                if(data) {
                    location.reload();
                }
            },
        });
    }
</script>
</html>