<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        if($_SESSION['role'] == 'admin' && !$_SESSION['account'] && !$_SESSION['name']) $this -> error('请先登录！',U('Login/login'),1);
    }

    public function index(){
    }
}
?>