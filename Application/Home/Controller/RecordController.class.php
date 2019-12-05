<?php
namespace Home\Controller;
use Think\Controller;
class RecordController extends BaseController {
    public function index(){
        if($_GET) {
            $info = D('Needs') -> field('id,uid,disease,reward,worktime,status') -> where(['id' => $_GET['needs']]) -> find();
            $info = array_merge($info, D('User') -> field('name as u_name, sex as u_sex, age as u_age, phone as u_phone') -> where(['id' => $info['uid']]) -> find());
            $info = array_merge($info, D('Nurse') -> field('id as nid, name as n_name, sex as n_sex, age as n_age, phone as n_phone, work-year, work-add, work-expertise,merits') -> where(['id' => $_GET['nid']]) -> find());
            $this -> info = $info;
            $this -> display();
        }
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

    public function content() {
        $info = D('Needs') -> field('*') -> where(['id' => $_GET['id']]) -> find();
        $this -> info = $info;
        $this -> display();
    }

    public function record() {
        $info = D('Record') -> field('*') -> where(['needs' => $_GET['id']]) -> order('addtime desc') -> select();
        $this -> info = $info;
        $this -> display();
    }

    public function save() {
        if($_GET) {
            $rs = D('Record') -> add(['needs' => $_GET['id'], 'content' => $_GET['value'], 'addtime' => time()]);
            echo $rs;
        }
    }

    public function saveScore() {
        if($_GET) {
            $rs = D('Needs') -> where(['id' => $_GET['id']]) -> save(['score' => $_GET['score'], 'status' => 3]);
            if($rs) $rs = D('Nurse') -> where(['id' => $_GET['nid']]) -> setInc('merits',$_GET['score']-2);
            echo $rs;
        }
    }
}