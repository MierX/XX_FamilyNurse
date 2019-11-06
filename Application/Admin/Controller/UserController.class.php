<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_GET) {
            $info_list = D($_GET['role']) -> select();
            $count = D($_GET['role']) -> count();
            $this -> role = $_GET['role'];
            $this -> count = $count;
            $this -> data = $info_list;
        }
        $this -> display('index');
    }

    public function edit() {
        if($_GET) {
            D($_GET['role']) -> where(['id' => $_GET['id']]) -> save(['status' => $_GET['status']]);
            $this -> index();
        } else {
            echo "<script>alert('操作失败！刷新重试！');</script>";
        }
    }

    public function info() {
        if($_GET) {
            $info = D($_GET['role']) -> where(['id' => $_GET['id']]) -> find();
            $this -> user = $info;
            $this -> display();
        } else {
            echo "<script>alert('操作失败！刷新重试！');</script>";
        }
    }

    public function search() {
        parent::search();
        $this -> display('index');
    }
}