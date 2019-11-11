<?php
namespace Home\Controller;
use Think\Controller;
class NeedsController extends BaseController {
    public function index() {

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