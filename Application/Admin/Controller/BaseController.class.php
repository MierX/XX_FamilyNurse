<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        if($_SESSION['admin_role'] != 'admin' && !$_SESSION['admin_account'] && !$_SESSION['admin_name']) $this -> error('请先登录！',U('Login/login'),1);
    }

    public function index(){
    }

    public function search() {
        foreach ($_GET as $key => $value) {
            if($key == 'table') {
                $table = $value;
            } else {
                if(stristr($value,'like')) {
                    $value = json_decode(str_replace('|','',$value),true);
                }
                $where[$key] = $value;
            }
        }
        $info = D($table) -> where($where) -> select();
        $count = D($table) -> where($where) -> count();
        $this -> count = $count;
        $this -> role = $table;
        $this -> data = $info;
        unset($_GET);
    }
}
?>