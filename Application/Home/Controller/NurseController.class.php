<?php
namespace Home\Controller;
use Think\Controller;
class NeedsController extends BaseController {
    public function index() {
        $info = D('Nurse') -> field('remark') -> where(['id' => $_GET['id']]) -> find();
        $this -> data = $info;
        $this -> display();
    }
}