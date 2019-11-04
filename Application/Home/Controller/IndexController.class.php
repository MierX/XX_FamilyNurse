<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if($_SESSION['role']) {
            $user_info = D($_SESSION['role']) -> field('*') -> where(['account' => $_SESSION['account'], 'name' => $_SESSION['name']]) -> find();
            $this -> user = $user_info;
        }
        $this -> display();
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
                $this -> redirect('Index');
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
                $this -> redirect('Index');
            } else {
                $this -> error('信息输入错误！请重试！');
            }
        }
        $this -> display();
    }

    public function logout() {
        unset($_SESSION['account']);
        unset($_SESSION['role']);
        unset($_SESSION['name']);
        $this -> redirect('Index');
    }
}