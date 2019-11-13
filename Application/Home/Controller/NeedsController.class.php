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
}