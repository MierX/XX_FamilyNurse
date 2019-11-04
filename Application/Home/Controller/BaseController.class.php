<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        if(($_SESSION['role'] == 'User' || $_SESSION['role'] == 'Nurse') && $_SESSION['account'] && $_SESSION['name']) {
            return true;
        } else {
            $this -> error('请先登录！',U('Index/login'));
        }
    }

    public function index(){
    }
}