<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        if($_SESSION['admin_role'] != 'admin' && !$_SESSION['admin_account'] && !$_SESSION['admin_name']) $this -> error('请先登录！',U('Login/login'),1);
    }

    public function index() {
        if($_GET) {
            $table =  $_GET['table'];
            $count = D($_GET['table']) -> count();
            $info_list = D($_GET['table']) -> select();
            unset($_GET);
        }
        return [$table,$count,$info_list];
    }

    public function search() {
        foreach ($_GET['where'] as $key => &$value) {
            if(stristr($value,'null')) unset($_GET['where'][$key]);
            if(stristr($value,'like')) $value = json_decode(str_replace('|','',$value),true);
            if(stristr($value,'between')) $value = json_decode($value,true);
        }
        $table = $_GET['table'];
        $count = D($_GET['table']) -> where($_GET['where']) -> count();
        $info = D($_GET['table']) -> where($_GET['where']) -> select();
        unset($_GET);
        return [$table,$count,$info];
    }

    public function info() {
        if($_GET) {
            $info = D($_GET['table']) -> where($_GET['where']) -> find();
            unset($_GET);
        }
        return $info;
    }

    public function edit() {
        if($_GET) {
            if($_GET['where']['id']) {
                D($_GET['table']) -> where($_GET['where']) -> save($_GET['data']);
            } else {
                $_GET['data']['addtime'] = time();
                D($_GET['table']) -> add($_GET['data']);
            }
            $table = $_GET['table'];
            unset($_GET);
        } else if($_POST) {
            if($_POST['where']['id']) {
                D($_POST['table']) -> where($_POST['where']) -> save($_POST['data']);
            } else {
                $_POST['data']['addtime'] = time();
                D($_POST['table']) -> add($_POST['data']);
            }
            $table = $_POST['table'];
            unset($_POST);
        }
        $_GET['table'] = $table;
    }
}
?>