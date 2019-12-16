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
			<input id="keyword" type="text" class="input-text" onmouseover="this.style.border = '1px #DDDDDD solid'" style="width:250px;" placeholder="输入需求标题" />
			<button type="button" class="btn radius" onclick="search()">
                <i class="Hui-iconfont">&#xe665;</i> 搜需求
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
                        <th>报酬</th>
                        <th>工时</th>
                        <th>发布时间</th>
                        <th>截止时间</th>
                        <th>状态</th>
                    </tr>
				</thead>
				<tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                            <td><?php echo ($vo["id"]); ?></td>
                            <td>
                                <u style="cursor:pointer" class="text-primary" onclick="show('需求详情','<?php echo U('info');?>?table=Needs&where[id]=<?php echo ($vo["id"]); ?>','1600','1200')"><?php echo ($vo["title"]); ?></u>
                            </td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["reward"]); ?></td>
                            <td><?php echo ($vo["worktime"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["endtime"])); ?></td>
                            <td class="td-status">
                                <?php if($vo["status"] == 1): ?><u style="cursor:pointer" class="text-primary" href="javascript:;" onclick="edit('?table=<?php echo ($table); ?>&where[id]=<?php echo ($vo["id"]); ?>&data[status]=4')">未进行</u>
                                <?php elseif($vo["status"] == 2): ?>
                                    进行中
                                <?php elseif($vo["status"] == 3): ?>
                                    已完成
                                <?php else: ?>
                                    <u style="cursor:pointer" class="text-primary" href="javascript:;" onclick="edit('?table=<?php echo ($table); ?>&where[id]=<?php echo ($vo["id"]); ?>&data[status]=1&data[addtime]=<?php echo time();?>&data[endtime]=<?php echo strtotime('+1 week');?>')">取消</u><?php endif; ?>
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
            title = JSON.stringify(['like', ['%',value,'%'].join('|')]);
            window.location.href = "<?php echo U('search');?>?table=<?php echo ($table); ?>&where[title]="+title;
        } else {
            window.location.href = "<?php echo U('Needs/index');?>?table=<?php echo ($table); ?>";
        }
    }
</script>
</html>