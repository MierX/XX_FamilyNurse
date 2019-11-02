<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){

    }

    public function login() {
        if($_POST) {
            $info = D('Admin') -> field('*') -> where(['account' => $_POST['account'], 'password' => $_POST['password']]) -> find();
            if($info) {
                $_SESSION['role'] = $info['role'];
                $_SESSION['account'] = $info['account'];
                $_SESSION['name'] = $info['name'];
                $this -> redirect('Index/index');
            } else {
                $this -> error('信息输入错误！请重试！');
            }
        }
        $this -> display();
    }
}