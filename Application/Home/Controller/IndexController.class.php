<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        if($_SESSION['role']) {
            $user_info = D($_SESSION['role']) -> field('*') -> where(['account' => $_SESSION['account'], 'name' => $_SESSION['name']]) -> find();
            $this -> user = $user_info;
        }
        $notice_info = D('Notice') -> where(['status' => 1]) -> order('addtime desc,hot desc') -> select();
        $nurse_info = D('Nurse') -> where(['status' => 1]) -> order('addtime desc,merits desc') -> select();
        $this -> Notice = $notice_info;
        $this -> Nurse = $nurse_info;
        if($_GET['search_info']) {
            $this -> $_GET['table'] = $_GET['search_info'];
            unset($_GET);
        }
        $this -> display('index');
    }

    public function search() {
        if($_GET) {
            foreach ($_GET['where'] as $key => &$value) {
                if(stristr($value,'null')) unset($_GET['where'][$key]);
                if(stristr($value,'like')) $value = json_decode(str_replace('|','',$value),true);
                if(stristr($value,'between')) $value = json_decode($value,true);
            }
            $info = D($_GET['table']) -> where($_GET['where']) -> select();
            $_GET['search_info'] = $info;
            $this -> index();
        }
    }

    public function register() {
        if($_POST) {
            if($_POST['role'] == 'User') {
                unset($_POST['work-year']);
                unset($_POST['work-add']);
                unset($_POST['remark']);
            }
            $_POST['addtime'] = time();
            $_POST['status'] = 1;
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
                $info = D($_POST['role']) -> field('*') -> where(['status' => 1, 'account' => $_POST['account'], 'password' => $_POST['password']]) -> find();
            } else if($_POST['role'] == 'Nurse') {
                $info = D($_POST['role']) -> field('*') -> where(['status' => 1, 'account' => $_POST['account'], 'password' => $_POST['password'], 'id' => $_POST['job-num']]) -> find();
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