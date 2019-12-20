<?php
namespace Home\Controller;
use Think\Controller;
class NeedsController extends BaseController {
    public function index() {
        $info = D('Needs')  -> field('uid,needs') -> where(['id' => $_GET['id']]) -> find();
        $info['name'] = D('User') -> field('name') -> where(['id' => $info['uid']]) -> find()['name'];
        $where = ['uid' => $_SESSION['id']];
        if($_SESSION['role'] == 'Nurse') $where = ['nid' => $_SESSION['id']];
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where($where) -> find()['ids'],true);
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        $apply_list = D('Apply') -> field('nurse') -> where(['needs' => $_GET['id']]) -> order('addtime asc') -> select();
        foreach ($apply_list as $key => $value) {
            $nurse = D('Nurse') -> field('id as nid,name') -> where(['id' => $value['nurse'], 'status' => 1]) -> find();
            if($nurse) $applyer[] = $nurse;
        }
        $this -> applyer = $applyer;
        $this -> collection = $collection;
        $this -> needs = $_GET['id'];
        $this -> data = $info;
        $this -> display();//调用与这个方法同名，且属于当前控制器的对应模板
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
        $default = "<p>与患者关系：</p>
						<p>患者姓名：</p>
						<p>健康状态：</p>
						<p>性别：</p>
						<p>年龄：</p>
						<p>现在居住地：</p>";
        $this -> dfContent = $default;
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

    public function checkStatus() {
        if($_GET) {
            $rs = D('Apply') -> field('id') -> where(['needs' => $_GET['id'], 'nurse' => $_GET['nid']]) -> find();
            if($rs) {
                echo false;
            } else {
                D('Apply') -> add(['needs' => $_GET['id'], 'nurse' => $_GET['nid'], 'addtime' => time()]);
                echo true;
            }
        }
    }

    public function accept() {
        if($_GET) {
            $rs = D('Accept') -> field('id') -> where(['needs' => $_GET['needs'], 'uid' => $_GET['user'], 'nid' => $_GET['nurse']]) -> find();
            if($rs) {
                echo false;
            } else {
                D('Accept') -> add(['needs' => $_GET['needs'], 'uid' => $_GET['user'], 'nid' => $_GET['nurse'], 'addtime' => time()]);
                D('Needs') -> where(['id' => $_GET['needs']]) -> save(['status' => 2]);
                D('Apply') -> where(['needs' => $_GET['needs']]) -> delete();
                echo true;
            }
        }
    }
}