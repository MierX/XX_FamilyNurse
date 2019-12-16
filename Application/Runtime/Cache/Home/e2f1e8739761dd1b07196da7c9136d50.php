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
    <div id="loginform" class="loginBox" style="top: 270px; padding-top: 5px">
      <form class="form form-horizontal" action="<?php echo U('register');?>" method="post" onsubmit="return registerNow()">
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
              <input type="text" id="account" name="account" class="input-text size-L" value="" placeholder="请设置你的账号(不少于6位)" onfocusout="checkValue(this.name,this.value)" />
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
              <input type="password" name="password" class="input-text size-L" value="" placeholder="请设置你的密码(不少于6位)" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_password" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe62c;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="text" id="name" name="name" class="input-text size-L" value="" placeholder="请输入你的真实姓名" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_name" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="iconfont">&#xe7f8;</i>
          </label>
          <div class="formControls col-xs-8" style="margin-top: 5px;">
            <label style="font-size: 20px">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男：<input type="radio" name="sex" class="radio-box size-L" value="1" />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女：<input type="radio" name="sex" class="radio-box size-L" value="2" />
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe616;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="number" name="age" class="input-text size-L" value="" placeholder="请输入周岁(仅输入数字)" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_age" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe6a3;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="number" id="phone" name="phone" class="input-text size-L" value="" placeholder="请输入联系电话" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_phone" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe602;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input type="number" id="card" name="card" class="input-text size-L" value="" placeholder="请输入身份证号" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_card" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div id="year" class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe621;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input id="wordYear" type="number" name="work-year" class="input-text size-L" value="" placeholder="请输入工龄(年为单位,仅支持数字)" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_work-year" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div id="add" class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe643;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <input id="workAdd" type="text" name="work-add" class="input-text size-L" value="" placeholder="请输入就职医院(建议全称)" onfocusout="checkValue(this.name,this.value)" />
              <i id="i_work-add" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div id="re" class="row cl">
          <label class="form-label col-xs-3">
            <i class="Hui-iconfont">&#xe636;</i>
          </label>
          <div class="formControls col-xs-8">
            <label>
              <textarea id="remark" name="remark" class="textarea" style="width: 360px" placeholder="请填写自我介绍(不少于50字)" onfocusout="checkValue(this.name,this.value)"></textarea>
              <i id="i_remark" class="Hui-iconfont"></i>
            </label>
          </div>
        </div>
        <div class="row cl">
          <div class="formControls col-xs-8 col-xs-offset-3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn size-L" value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="goLogin()">
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
      document.getElementById("year").style.display = 'none';
      document.getElementById("add").style.display = 'none';
      document.getElementById("re").style.display = 'none';
      document.getElementById("account").value = '';
      document.getElementById("name").value = '';
      document.getElementById("phone").value = '';
      document.getElementById("card").value = '';
      document.getElementById("wordYear").value = '';
      document.getElementById("workAdd").value = '';
      document.getElementById("remark").value = '';
      document.getElementById("loginform").style.height = '560px';
      document.getElementById("loginform").style.borderBottom = '1px #78b5b8 solid';
      role = 'User';
    } else if(value === 'Nurse') {
      document.getElementById("account").value = '';
      document.getElementById("name").value = '';
      document.getElementById("phone").value = '';
      document.getElementById("card").value = '';
      document.getElementById("year").style.display = '';
      document.getElementById("add").style.display = '';
      document.getElementById("re").style.display = '';
      document.getElementById("loginform").style.height = '830px';
      document.getElementById("loginform").style.borderBottom = 'none';
      role = 'Nurse';
    }
  }
  
  function checkValue(name, value) {
    if(value) {
      if(name === 'account' || name === 'name' || name === 'phone' || name === 'card') {
        var rs = true;
        if(name === 'account' && value.length < 6) rs =  valueError(name);
        if(name === 'phone' && value.length !== 11) rs =  valueError(name);
        if(name === 'card' && value.length !== 18) rs =  valueError(name);
        if(rs) {
          $.ajax({
            url:"<?php echo U('checkValue');?>",
            type:"get",
            data:{
              "role":role,
              "name":name,
              "value":value,
            },
            success:function (data) {
              if(data) {
                valueSuccess(name);
              } else {
                valueError(name);
              }
            },
            error:function () {
              alert('未知错误！请调试！');
            }
          })
        }
      } else if(name === 'password') {
        if(value.length >= 6) {
          valueSuccess(name);
        } else {
          alert('密码至少设置6位！');
          valueError(name);
        }
      } else if(name === 'age' || name === 'work-year' || name === 'work-add') {
        if(value) {
          valueSuccess(name);
        } else {
          valueError(name);
        }
      } else if(name === 'remark') {
        if(value.length >= 50) {
          valueSuccess(name);
        } else {
          valueError(name);
        }
      }
    } else {
      valueError(name);
    }
  }

  function valueSuccess(name) {
    document.getElementById('i_'+name).innerHTML = '&#xe6a7;';
    document.getElementById('i_'+name).style.color = 'green';
    document.getElementById('i_'+name).style.fontSize = '21px';
    value[name] = 1;
    console.log(value);
  }

  function valueError(name) {
    document.getElementById('i_'+name).innerHTML = '&#xe6a6;';
    document.getElementById('i_'+name).style.color = 'red';
    document.getElementById('i_'+name).style.fontSize = '21px';
    value[name] = 0;
    console.log(value);
    return false;
  }

  function registerNow() {
    if(role === 'User') {
      delete value['work-year'];
      delete value['work-add'];
      delete value['remark'];
      if(Object.keys(value).length !== 6) {
        alert('请确认所有信息填写正确！');
        return false;
      } else {
        for(var i in value) {
          if(!value[i]) {
            alert('请确认所有信息填写正确！');
            return false;
          }
        }
      }
    } else if(role === 'Nurse') {
      if(Object.keys(value).length != 9) {
        alert('请确认所有信息填写正确！');
        return false;
      } else {
        for(var j in value) {
          if(!value[j]) {
            alert('请确认所有信息填写正确！');
            return false;
          }
        }
      }
    }
    var sexObj = document.getElementsByName("sex");
    var checked = 0;
    for(var k = 0; k < sexObj.length; k++) {
      if(sexObj[k].checked === true) checked = 1;
    }
    if(checked) {
      return true;
    } else {
      alert('请确认所有信息填写正确！');
      return false;
    }
  }

  function goLogin() {
    window.location.href = "<?php echo U('login');?>";
  }
</script>
</html>