<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this -> display();
    }

    public function logout() {
        unset($_SESSION['admin_role']);
        unset($_SESSION['admin_account']);
        unset($_SESSION['admin_name']);
        echo "<script type='text/javascript'>parent.location.reload();</script>";
    }
}