<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_GET) {
            $user_info = D($_GET['role']) -> field('*') -> where(['id' => $_GET['id']]) -> find();
        }
        if($_POST) {
            if(stristr($_POST['sex'],'女')) {
                $_POST['sex'] = 0;
            } else if(stristr($_POST['sex'],'男')) {
                $_POST['sex'] = 1;
            } else {
                unset($_POST['sex']);
            }
            $_POST['age'] = intval($_POST['age']);
            $_POST['work-year'] = intval($_POST['work-year']);
            $id = $_POST['id'];
            unset($_POST['id']);
            D($_POST['role']) -> where(['id' => $id]) -> save($_POST);
            $user_info = D($_POST['role']) -> field('*') -> where(['id' => $id]) -> find();
        }
        $this -> user = $user_info;
        $this -> display();
    }
}