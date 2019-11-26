<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends BaseController {
    public function index(){
        if($_GET) {
            $user = D('User') -> field('*') -> where(['id' => $_GET['uid']]) -> find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $_GET['nid']]) -> find();
            $this -> display();
        }
    }

    public function chatList() {
        $this -> display();
    }
}