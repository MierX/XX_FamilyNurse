<?php
namespace Home\Controller;
use Think\Controller;
class NoticeController extends BaseController {
    public function index() {
        $notice_info = D('Notice') -> where(['status' => 1]) -> order('addtime desc,hot desc') -> select();
        $this -> Notice = $notice_info;
        $this -> display();
    }

    public function info() {
        $info = D('Notice') -> field('content') -> where(['id' => $_GET['id']]) -> find();
        $rs = D('Notice') -> where(['id' => $_GET['id']]) -> setInc('hot');
        $this -> data = $info;
        $this -> display();
    }
}