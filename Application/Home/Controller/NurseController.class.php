<?php
namespace Home\Controller;
use Think\Controller;
class NurseController extends BaseController {
    public function index() {
        $info = D('Nurse') -> field('remark') -> where(['id' => $_GET['id']]) -> find();
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where(['uid' => $_SESSION['id']]) -> find()['ids'],true);
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        $this -> collection = $collection;
        $this -> nurse = $_GET['id'];
        $this -> data = $info;
        $this -> display();
    }
}