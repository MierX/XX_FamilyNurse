<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this -> display();
    }

    // 注销
    public function logout() {
        //销毁$_SESSION
        unset($_SESSION['admin_role']);
        unset($_SESSION['admin_account']);
        unset($_SESSION['admin_name']);
        //刷新父窗口，关闭子窗口
        echo "<script type='text/javascript'>parent.location.reload();</script>";        
    }
}