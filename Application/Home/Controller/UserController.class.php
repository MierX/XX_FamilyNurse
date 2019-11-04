<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_GET) {
            $user_info = D($_GET['role']) -> field('*') -> where(['id' => $_GET['id']]) -> find();
        }
        $this -> user = $user_info;
        $this -> display();
    }
}