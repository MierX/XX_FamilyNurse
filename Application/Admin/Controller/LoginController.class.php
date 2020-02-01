<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){

    }

    public function login() {
        if($_POST) {
            $info = D('admin') -> field('*') -> where(['account' => $_POST['account'], 'password' => $_POST['password']]) -> find();
            //实例化数据库表
            if($info) {
                //将信息存储到session中
                $_SESSION['admin_role'] = $info['role'];                
                $_SESSION['admin_account'] = $info['account'];
                $_SESSION['admin_name'] = $info['name'];
                $this -> redirect('Index/Index');//信息正确，跳转到后台主界面
            } else {
                $this -> error('信息输入错误！请重试！');
            }
        }
        $this -> display();
    }
}