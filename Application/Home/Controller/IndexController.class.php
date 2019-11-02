<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function register() {
        if($_POST) {
            if($_POST['role'] == 'User') {
                unset($_POST['work-year']);
                unset($_POST['work-add']);
                unset($_POST['remark']);
            }
            $_POST['addtime'] = time();
            $result = D($_POST['role']) -> add($_POST);
            if($result) {
                $_SESSION['account'] = $_POST['account'];
                $_SESSION['role'] = $_POST['role'];
                $_SESSION['name'] = $_POST['name'];
                $this -> redirect('index');
            }
        }
        $this -> display();
    }

    public function checkValue() {
        $role = $_GET['role'];
        $name = $_GET['name'];
        $value = $_GET['value'];
        if($role && $name && $value) {
            $info = D($role) -> field('name') -> where([$name => $value]) -> find();
            if(!$info) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }

    public function login() {
        if($_POST) {
            if($_POST['role'] == 'User') {
                $info = D($_POST['role']) -> field('*') -> where(['account' => $_POST['account'], 'password' => $_POST['password']]) -> find();
            } else if($_POST['role'] == 'Nurse') {
                $info = D($_POST['role']) -> field('*') -> where(['account' => $_POST['account'], 'password' => $_POST['password'], 'id' => $_POST['job-num']]) -> find();
            }
            if($info) {
                $_SESSION['account'] = $info['account'];
                $_SESSION['role'] = $info['role'];
                $_SESSION['name'] = $info['name'];
                $this -> redirect('index');
            } else {
                $this -> error('信息输入错误！请重试！');
            }
        }
        $this -> display();
    }
}