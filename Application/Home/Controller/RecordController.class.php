<?php
namespace Home\Controller;
use Think\Controller;
class RecordController extends BaseController {
    public function index(){

    }

    public function list() {
        if($_GET) {
            $_GET['role'] == 'User' ? $where = ['uid' => $_GET['id']] : $where = ['nid' => $_GET['id']];
            $info = D('Accept') -> field('*') -> where($where) -> order('addtime asc,endtime asc,id asc') -> select();
            foreach ($info as $key => &$value) {
                $value['uid_name'] = D('User') -> field('name') -> where(['id' => $value['uid']]) -> find()['name'];
                $value['nid_name'] = D('Nurse') -> field('name') -> where(['id' => $value['nid']]) -> find()['name'];
                $value['needs_name'] = D('Needs') -> field('title') -> where(['id' => $value['needs']]) -> find()['title'];
                $value['status'] = D('Needs') -> field('status') -> where(['id' => $value['needs']]) -> find()['status'];
            }
            $this -> info = $info;
            $this -> display();
        }
    }
}