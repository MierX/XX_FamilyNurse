<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_GET) {
            $user_info = D($_GET['role']) -> field('*') -> where(['id' => $_GET['id']]) -> find();
        }
        if($_POST) {
            //字符串查找与匹配，判断性别
            if(stristr($_POST['sex'],'女')) {
                $_POST['sex'] = 2;
            } else if(stristr($_POST['sex'],'男')) {
                $_POST['sex'] = 1;
            } else {
                unset($_POST['sex']);
            }
            //将年龄和工龄转换为整型
            $_POST['age'] = intval($_POST['age']);
            $_POST['work-year'] = intval($_POST['work-year']);
            $id = $_POST['id'];
            unset($_POST['id']);
            //实例化数据表，将数据保存到数据库
            D($_POST['role']) -> where(['id' => $id]) -> save($_POST);
            $user_info = D($_POST['role']) -> field('*') -> where(['id' => $id]) -> find();
        }
        $this -> user = $user_info;
        $this -> display();
    }

    //我的需求
    public function myNeeds() {
        //实例化患者需求表，查询数据
        $needs = D('Needs') -> where(['uid' => $_GET['id']]) -> select();
        //将$needs数组的值赋给$needs
        $needs = array_values($needs);
        if($_GET['check']) {
            //若点击“我的需求”，查询不到当前用户发布的需求，返回true
            if(!$needs) {
                echo true;
            } else {
                echo false;
            }
        } else {
            $this -> needs = $needs;
            $this -> display();
        }
    }
}