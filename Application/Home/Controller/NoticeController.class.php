<?php
namespace Home\Controller;
use Think\Controller;
class NoticeController extends BaseController {
    public function index() {
        $info = D('Notice') -> field('content') -> where(['id' => $_GET['id']]) -> find();
        $rs = D('Notice') -> where(['id' => $_GET['id']]) -> setInc('hot');
        $this -> data = $info;
        $this -> display();
    }
}