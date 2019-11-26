<?php
namespace Home\Controller;
use Think\Controller;
class NurseController extends BaseController {
    public function index() {
        $info = D('Nurse') -> field('name,remark') -> where(['id' => $_GET['id']]) -> find();
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where(['uid' => $_SESSION['id']]) -> find()['ids'],true);
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        $this -> collection = $collection;
        $this -> nurse = $_GET['id'];
        $this -> data = $info;
        $this -> display();
    }

    public function myNeeds() {
        if($_GET['id']) {
            $needs = D('NurseNeeds') -> field('nid') -> where(['nurse' => $_GET['id']]) -> order('id asc') -> select();
            $needs =array_column($needs,'nid');
            if($needs) {
                if($_GET['list']) {
                    $need_list = D('Needs') -> field('*') -> where(['id' => ['in', $needs], 'status' => ['in', [2,3]]]) -> order('id asc') -> select();
                    $this -> needs = $need_list;
                    $this -> display();
                } else {
                    echo true;
                }
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
}