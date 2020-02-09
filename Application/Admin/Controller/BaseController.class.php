<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        //构造方法，若没有登录则跳转到登录界面
        if($_SESSION['admin_role'] != 'admin' && !$_SESSION['admin_account'] && !$_SESSION['admin_name']) $this -> error('请先登录！',U('Login/login'),1);
    }

    public function index() {
        if($_GET) {
            $table =  $_GET['table'];
            //统计表中的记录数
            $count = D($_GET['table']) -> count();
            //查询表中的所有数据
            $info_list = D($_GET['table']) -> select();
            //释放内存
            unset($_GET);
        }
        return [$table,$count,$info_list];
    }

    // 数据库关键字搜索方法
    public function search() {
        foreach ($_GET['where'] as $key => &$value) {
            //匹配字符串是否未空，销毁关键字
            if(stristr($value,'null')) unset($_GET['where'][$key]);
            //匹配字符串是否含有like，将空格替换成“|”
            if(stristr($value,'like')) $value = json_decode(str_replace('|','',$value),true);
            //匹配字符串是否含有between，
            if(stristr($value,'between')) $value = json_decode($value,true);
        }
        //获取$_GET值
        $table = $_GET['table'];
        //查询记录数
        $count = D($_GET['table']) -> where($_GET['where']) -> count();
        //查询关键字搜索出的所有记录
        $info = D($_GET['table']) -> where($_GET['where']) -> select();
        unset($_GET);
        return [$table,$count,$info];
    }

    // 数据库查询方法
    public function info() {
        if($_GET) {
            //实例化表，查询表中数据
            $info = D($_GET['table']) -> where($_GET['where']) -> find();
            unset($_GET);
        }
        return $info;
    }

    // 数据库更新、软删除方法
    public function edit() {
        if($_GET) {
            if($_GET['where']['id']) {
                //实例化数据表，将数据存储到数据库
                D($_GET['table']) -> where($_GET['where']) -> save($_GET['data']);
            } else {
                //获取当前时间，将数据写入数据库
                $_GET['data']['addtime'] = time();
                D($_GET['table']) -> add($_GET['data']);
            }
            $table = $_GET['table'];
            unset($_GET);
        } else if($_POST) {
            if($_POST['where']['id']) {                
                //实例化数据表，将数据存储到数据库
                D($_POST['table']) -> where($_POST['where']) -> save($_POST['data']);
            } else {
                //获取当前时间，将数据写入数据库
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