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
            $info_list = D($_GET['table']) -> select();
            $count = D($_GET['table']) -> count();
            $this -> table = $_GET['table'];
            $this -> count = $count;
            $this -> data = $info_list;
            unset($_GET);
        }
    }

    public function search() {
        foreach ($_GET['where'] as $key => &$value) {
            if(stristr($value,'null')) unset($_GET['where'][$key]);
            if(stristr($value,'like')) $value = json_decode(str_replace('|','',$value),true);
            if(stristr($value,'between')) $value = json_decode($value,true);
        }
        dump($_GET['where']);
        $info = D($_GET['table']) -> where($_GET['where']) -> select();
        $count = D($_GET['table']) -> where($_GET['where']) -> count();
        $this -> count = $count;
        $this -> table = $_GET['table'];
        $this -> data = $info;
        unset($_GET);
    }

    public function info() {
        if($_GET) {
            $info = D($_GET['table']) -> where($_GET['where']) -> find();
            $this -> data = $info;
            unset($_GET);
        }
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