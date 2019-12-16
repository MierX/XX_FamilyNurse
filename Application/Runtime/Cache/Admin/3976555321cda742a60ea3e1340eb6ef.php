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
    <title>需求管理</title>
</head>
<body>
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span> 需求管理
        <span class="c-gray en">&gt;</span> 需求列表
	</nav>
	<div class="page-container">
		<div class="text-c">
			<input id="keyword" type="text" class="input-text" onmouseover="this.style.border = '1px #DDDDDD solid'" style="width:250px;" placeholder="输入序号" />
			<button type="button" class="btn radius" onclick="search()">
                <i class="Hui-iconfont">&#xe665;</i> 搜记录
            </button>
            <span class="r">
                统计：<strong><?php echo ($count); ?></strong> 条数据
            </span>
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
                    <tr class="text-c">
                        <th>序号</th>
                        <th>标题</th>
                        <th>发布人</th>
                        <th>护士</th>
                        <th>评价</th>
                        <th>开始时间</th>
                        <th>完成时间</th>
                        <th>遗嘱</th>
                    </tr>
				</thead>
				<tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                            <td><?php echo ($vo["id"]); ?></td>
                            <td>
                                <u style="cursor:pointer" class="text-primary" onclick="show('需求详情','<?php echo U('Needs/info');?>?table=Needs&where[id]=<?php echo ($vo["needs"]); ?>','1600','1200')"><?php echo ($vo["needs_name"]); ?></u>
                            </td>
                            <td>
                                <u style="cursor:pointer" class="text-primary" onclick="show('用户信息','<?php echo U('User/info');?>?table=User&where[id]=<?php echo ($vo["uid"]); ?>','1600','1200')"><?php echo ($vo["user_name"]); ?></u>
                            </td>
                            <td>
                                <u style="cursor:pointer" class="text-primary" onclick="show('用户信息','<?php echo U('User/info');?>?table=Nurse&where[id]=<?php echo ($vo["nid"]); ?>','1600','1200')"><?php echo ($vo["nurse_name"]); ?></u>
                            </td>
                            <td>
                                <?php if($vo["score"] == 0): ?>尚未评价
                                <?php elseif($vo["score"] == 1): ?>
                                    很差
                                <?php elseif($vo["score"] == 2): ?>
                                    差
                                <?php elseif($vo["score"] == 3): ?>
                                    一般
                                <?php elseif($vo["score"] == 4): ?>
                                    好
                                <?php elseif($vo["score"] == 5): ?>
                                    很好<?php endif; ?>
                            </td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                            <td>
                                <?php if($vo["endtime"] == 0): ?>尚未完成
                                    <?php else: ?>
                                    <?php echo (date('Y-m-d H:i:s',$vo["endtime"])); endif; ?>
                            </td>
                            <td>
                                <u style="cursor:pointer" class="text-primary" onclick="show('医嘱','<?php echo U('record');?>?table=Record&where[needs]=<?php echo ($vo["needs"]); ?>','1600','1200')">查看</u>
                                <?php if($vo["endtime"] != 0): ?>|
                                    <u style="cursor:pointer" class="text-primary" onclick="cancelRecord('<?php echo ($vo["id"]); ?>')">取消</u><?php endif; ?>
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
			"aaSorting": [[ 0, "asc" ]],//默认第几个排序
			"aoColumnDefs": [
				{"orderable":false,"aTargets":[1,3]}// 制定列不参与排序
			],
            "searching":false,
            "bLengthChange":false,
		});

	});

	function cancelRecord(id) {
        // var q1 = confirm('您确定要取消本次医护记录吗？');
        // if(q1) {
        //     var q2 = confirm('取消本次医护记录将会相应地扣去该护士的绩效！');
        //     if(q2) {
        //
        //     }
        // }
        var q3 = confirm('本操作一旦执行不可逆！！！');
        if(q3) {
            $.ajax({
                url:"cancelRecord",
                type:"get",
                data:{
                    id:id,
                },
                success:function (data) {
                    if(data) {
                        alert('取消成功！');
                        location.reload();
                    }
                },
                error:function () {
                    alert('未知错误！请重试！');
                }
            });
        }
    }

	function show(title,url,id,w,h){
		layer_show(title,url,w,h);
	}
	function edit(get) {
        var choose = confirm("该操作将改变此用户的状态");
        if(choose) {
            window.location.href = "<?php echo U(edit);?>"+get;
        }
    }
    function checkTime(id,value) {
	    var time = new Date(value.replace(/-/g,'/')).getTime();
	    var nowTime = new Date().getTime();
	    if(time <= nowTime) {
            if(id === 'max') {
                var min = document.getElementById("min").value;
                min = new Date(min.replace(/-/g,'/')).getTime();
                if(min) {
                    if(time <= min) {
                        alert('请大于最小时间！');
                        document.getElementById(id).value = '';
                    }
                } else {
                    alert('请先选择最小时间！');
                    document.getElementById(id).value = '';
                }
            }
        } else {
	        alert('请选择正确时间！');
	        document.getElementById(id).value = '';
        }
    }
    function search() {
	    var value = document.getElementById("keyword").value;
        if(value) {
            window.location.href = "<?php echo U('search');?>?table=Accept&where[id]="+value;
        } else {
            window.location.href = "<?php echo U('Accept/index');?>?table=Accept";
        }
    }
</script>
</html>