<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        if ($_SESSION['role']) {
            $user_info = D($_SESSION['role']) -> field('*') -> where(['account' => $_SESSION['account'], 'name' => $_SESSION['name']]) -> find();
            if ($_SESSION['role'] == 'User') {
                $collection = json_decode(D($_SESSION['role'] . 'Collection') -> field('ids') -> where(['uid' => $_SESSION['id']]) -> find()['ids'], true);
                if ($collection) {
                    $collection_info = D('Nurse') -> where(['id' => ['in', $collection], 'status' => 1]) -> limit('15') -> select();
                    $collection_count = count($collection_info);
                    $this -> collection_count = $collection_count;
                    $this -> collection = $collection_info;
                }
            } elseif ($_SESSION['role'] == 'Nurse') {
                $collection = json_decode(D($_SESSION['role'] . 'Collection') -> field('ids') -> where(['nid' => $_SESSION['id']]) -> find()['ids'], true);
                if ($collection) {
                    $collection_info = D('Needs') -> where(['id' => ['in', $collection], 'status' => 1]) -> limit('15') -> select();
                    foreach ($collection_info as $k => &$v) {
                        if($v['endtime'] <= time()) {
                            $v['status'] = 4;
                            D('Needs') -> where(['id' => $v['id']]) -> save($v);
                            unset($collection_info[$k]);
                            continue;
                        }
                        $user = D('User') -> field('status') -> where(['id' => $v['uid']]) -> find()['status'];
                        if($user == 2) unset($collection_info[$k]);
                    }
                    $collection_info = array_values($collection_info);
                    $collection_count = count($collection_info);
                    $this -> collection_count = $collection_count;
                    $this -> collection = $collection_info;
                }
            }
            $this -> user = $user_info;
        }
        $this -> display('index');
    }

    public function checkPage() {
        if($_GET) {
            $table = $_GET['table'];
            if($table == 'Notice') {
                $order = 'addtime desc,hot desc';
            } else if($table == 'Nurse') {
                $order = 'addtime desc,merits desc';
            } else {
                $order = 'addtime desc';
            }
            $keyword = ['status' => 1];
            $page = $_GET['page'];
            if($page == -1) {
                $info = D($table) -> where($keyword) -> order($order) -> select();
                if(count($info) % 10 == 0) {
                    $page = count($info) / 10;
                } else {
                    $page = intval(count($info) / 10 + 1);
                }
            }
            $min = ($page-1)*10;
            if($min < 0) {
                echo 'Up';
                exit;
            }
            $info = D($table) -> where($keyword) -> order($order) -> limit($min,10) -> select();
            if(empty($info)) {
                echo 'End';
                exit;
            }
            echo $page;
        } else {
            echo false;
        }
    }

    public function noticeList() {
        if($_GET['order']) {
            $order = $_GET['order'];
        } else {
            $order = 'addtime desc,hot desc';
        }
        if($_GET['keyword']) {
            $keyword = ['status' => 1, 'title' => ['like','%'.$_GET['keyword'].'%']];
        } else {
            $keyword = ['status' => 1];
        }
        $page = $_GET['page'] ? $_GET['page'] : 1;
        $min = ($page-1)*10;
        $notice_info = D('Notice') -> where($keyword) -> order($order) -> limit($min,10) -> select();
        $this -> page = $page;
        $this -> Notice = $notice_info;
        $this -> display();
    }

    public function needsList() {
        if($_GET['keyword']) {
            $keyword = ['status' => 1, 'title' => ['like','%'.$_GET['keyword'].'%']];
        } else {
            $keyword = ['status' => 1];
        }
        $page = $_GET['page'] ? $_GET['page'] : 1;
        $min = ($page-1)*10;
        $info_list = D('Needs') -> where($keyword) -> order('addtime desc') -> limit($min,10) -> select();
        foreach ($info_list as $k => &$v) {
            if($v['endtime'] <= time()) {
                $v['status'] = 4;
                D('Needs') -> where(['id' => $v['id']]) -> save($v);
                unset($info_list[$k]);
                continue;
            }
            $user = D('User') -> field('sex,name,status') -> where(['id' => $v['uid']]) -> find();
            if($user['status'] == 2) {
                unset($info_list[$k]);
            } else {
                if($user['sex'] == 1) {
                    $v['sex'] = '男';
                } else {
                    $v['sex'] = '女';
                }
                $v['name'] = $user['name'];
            }
        }
        $info_list = array_values($info_list);
        $this -> page = $page;
        $this -> Needs = $info_list;
        $this -> display();
    }

    public function nurseList() {
        if($_GET['keyword']) {
            $keyword = ['status' => 1, 'name' => ['like','%'.$_GET['keyword'].'%']];
        } else {
            $keyword = ['status' => 1];
        }
        $page = $_GET['page'] ? $_GET['page'] : 1;
        $min = ($page-1)*10;
        $nurse_info = D('Nurse') -> where($keyword) -> order('addtime desc,merits desc') -> limit($min,10) -> select();
        $this -> page = $page;
        $this -> Nurse = $nurse_info;
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
            $_POST['status'] = 1;
            $result = D($_POST['role']) -> add($_POST);
            if($result) {
                $_SESSION['id'] = D($_POST['role']) -> field('id') -> where(['account' => $_POST['account'], 'name' => $_POST['name']]) -> find()['id'];
                $_SESSION['account'] = $_POST['account'];
                $_SESSION['role'] = $_POST['role'];
                $_SESSION['name'] = $_POST['name'];
                $this -> redirect('Index');
            }
        }
        $this -> display();
    }

    public function checkValue() {
        if($_GET['role'] && $_GET['name'] && $_GET['value']) {
            $info = D($_GET['role']) -> field('name') -> where([$_GET['name'] => $_GET['value']]) -> find();
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
                $_SESSION['id'] = $info['id'];
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