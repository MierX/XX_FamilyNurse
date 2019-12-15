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
  <link href="../../../../Public/h-ui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
  <link href="../../../../Public/h-ui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
  <link href="../../../../Public/h-ui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
  <link href="../../../../Public/h-ui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
  <!--[if IE 6]>
    <script type="text/javascript" src="../../../../Public/h-ui/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
  <title>登录</title>
</head>
<body>
  <div class="loginWraper">
    <div id="loginform" class="loginBox" style="height: 250px; padding-top: 60px">
      <form class="form form-horizontal" action="<?php echo U('login');?>" method="post" onsubmit="return loginNow()">
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe60d;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="text" name="account" class="input-text size-L" value="" placeholder="请输入您的账号" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_account" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe60e;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="password" name="password" class="input-text size-L" value="" placeholder="请输入您的密码" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_password" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <div class="formControls col-xs-8 col-xs-offset-3">
            <input type="submit" class="btn size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" >
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript">
  var value = {};

  function checkValue(name, value) {
    if(value) {
      valueSuccess(name);
    } else {
      valueError(name);
    }
  }

  function valueSuccess(name) {
    document.getElementById('i_'+name).innerHTML = '&#xe6a7;';
    document.getElementById('i_'+name).style.color = 'green';
    document.getElementById('i_'+name).style.fontSize = '21px';
    value[name] = 1;
  }

  function valueError(name) {
    document.getElementById('i_'+name).innerHTML = '&#xe6a6;';
    document.getElementById('i_'+name).style.color = 'red';
    document.getElementById('i_'+name).style.fontSize = '21px';
    value[name] = 0;
    return false;
  }

  function loginNow() {
    if(Object.keys(value).length !== 2) {
      alert('请确认所有信息填写正确！');
      return false;
    } else {
      for(var i in value) {
        if(!i) {
          alert('请确认所有信息填写正确！');
          return false;
        }
      }
    }
    return true;
  }
</script>
</html>