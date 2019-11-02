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
  <script type="text/javascript" src="../../../../Public/h-ui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
  <script>DD_belatedPNG.fix('*');</script>
  <![endif]-->
  <title>注册</title>
</head>
<body>
  <div class="loginWraper">
    <div id="loginform" class="loginBox">
      <form class="form form-horizontal" action="<?php echo U('login');?>" method="post" onsubmit="return loginNow()">
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe62a;</i>
          </label>
          <div class="formControls col-xs-8" style="margin-top: 5px;">
            <label style="font-size: 20px">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户：<input type="radio" name="role" class="radio-box size-L" value="User" checked="checked" onclick="roleStatus(this.value)" />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;护士：<input type="radio" name="role" class="radio-box size-L" value="Nurse" onclick="roleStatus(this.value)" />
            </label>
          </div>
        </div>
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
        <div id="job-num" class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe602;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="number" name="job-num" class="input-text size-L" value="" placeholder="请输入您的工号" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_job-num" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <div class="formControls col-xs-8 col-xs-offset-3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn size-L" value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;"  onclick="goRegister()">
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script type="text/javascript" src="../../../../Public/h-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../Public/h-ui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript">
  window.onload = init();

  var role = 'User';

  var value = {};

  function init() {
    roleStatus();
  }

  function roleStatus(value) {
    if(value === 'User' || !value) {
      document.getElementById("job-num").style.display = 'none';
      document.getElementById("job-num").value = '';
      document.getElementById("loginform").style.height = '300px';
      document.getElementById("loginform").style.borderBottom = '1px #78b5b8 solid';
      role = 'User';
    } else if(value === 'Nurse') {
      document.getElementById("job-num").style.display = '';
      document.getElementById("loginform").style.height = '350px';
      document.getElementById("loginform").style.borderBottom = 'none';
      role = 'Nurse';
    }
  }

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
    if(role === 'User') {
      delete value['job-num'];
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
    } else if(role === 'Nurse') {
      if(Object.keys(value).length !== 3) {
        alert('请确认所有信息填写正确！');
        return false;
      } else {
        for(var j in value) {
          if(!j) {
            alert('请确认所有信息填写正确！');
            return false;
          }
        }
      }
    }
    return true;
  }

  function goRegister() {
    window.location.href = "<?php echo U('register');?>";
  }
</script>
</html>