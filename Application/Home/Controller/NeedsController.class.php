<?php
namespace Home\Controller;
use Think\Controller;
class NeedsController extends BaseController {
    public function index() {
        $info = D('Needs') -> field('needs') -> where(['id' => $_GET['id']]) -> find();
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where(['uid' => $_SESSION['id']]) -> find()['ids']);
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        $this -> collection = $collection;
        $this -> needs = $_GET['id'];
        $this -> data = $info;
        $this -> display();
    }

    public function edit() {
        if($_GET['id']) {
            $user = D('User') -> field('*') -> where(['id' => $_GET['id']]) -> find();
            if($user['sex'] == 1) {
                $user['sex'] = '男';
            } else {
                $user['sex'] = '女';
            }
            unset($_POST);
            unset($_GET);
        }
        $this -> user = $user;
        $addtime = time();
        $endtime = strtotime('+1 week');
        $this -> addtime = $addtime;
        $this -> endtime = $endtime;
        if($_POST) {
            $_POST['addtime'] = $addtime;
            $_POST['endtime'] = $endtime;
            if(!$_POST['needs']) $_POST['needs'] = '无';
            $rs = D('Needs') -> add($_POST);
            if($rs) {
                echo "<script>alert('发布成功！');parent.location.reload();</script>";
            } else {
                echo "<script>parent.location.reload();</script>";
            }
        }
        $this -> display();
    }

    public function editNeeds() {
        if($_GET['id']) {
            $info = D("Needs") -> field('*') -> where(['id' => $_GET['id']]) -> find();
            $user = D('User') -> field('*') -> where(['id' => $info['uid']]) -> find();
            if($user['sex'] == 1) {
                $user['sex'] = '男';
            } else {
                $user['sex'] = '女';
            }
        }
        $this -> info = $info;
        $this -> user = $user;
        $addtime = time();
        $endtime = strtotime('+1 week');
        $this -> addtime = $addtime;
        $this -> endtime = $endtime;
        if($_POST) {
            $_POST['addtime'] = $addtime;
            $_POST['endtime'] = $endtime;
            $_POST['status'] = 1;
            if(!$_POST['needs']) $_POST['needs'] = '无';
            $rs = D('Needs') -> save($_POST, ['id' => $_POST['id']]);
            if($rs) {
                echo "<script>alert('修改成功，已重新发布！');window.onload = layer_close();</script>";
            } else {
                echo "<script>parent.location.reload();</script>";
            }
        }
        $this -> display();
    }

    public function offNeeds() {
        if($_GET) {
            $rs = D('Needs') -> where(['id' => $_GET['id']]) -> save(['status' => 4]);
            if($rs) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
}