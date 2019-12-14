<?php
namespace Admin\Controller;

use Think\Controller;

class AcceptController extends BaseController {
    public function index() {
        $value = parent::index();
        $table = $value[0];
        $info_list = $value[2];
        foreach ($info_list as $k => &$v) {
            $user = D('User') -> field('*') -> where(['id' => $v['uid']]) ->find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $v['nid']]) -> find();
            $needs = D('needs') -> field('*') -> where(['id' => $v['needs']]) -> find();
            $v['user_name'] = $user['name'];
            $v['nurse_name'] = $nurse['name'];
            $v['needs_name'] = $needs['title'];
        }
        $info_list = array_values($info_list);
        $count = count($info_list);
        $this -> table = $table;
        $this -> count = $count;
        $this -> data = $info_list;
        $this -> display('index');
    }

    public function edit() {
        parent::edit();
        $this -> index();
    }

    public function info() {
        $info = parent::info();
        $this -> data = $info;
        $this -> display();
    }

    public function search() {
        $value = parent::search();
        $table = $value[0];
        $info_list = $value[2];
        foreach ($info_list as $k => &$v) {
            $user = D('User') -> field('*') -> where(['id' => $v['uid']]) ->find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $v['nid']]) -> find();
            $needs = D('needs') -> field('*') -> where(['id' => $v['needs']]) -> find();
            $v['user_name'] = $user['name'];
            $v['nurse_name'] = $nurse['name'];
            $v['needs_name'] = $needs['title'];
        }
        $info_list = array_values($info_list);
        $count = count($info_list);
        $this -> table = $table;
        $this -> count = $count;
        $this -> data = $info_list;
        $this -> display('index');
    }

    public function record() {
        $info = D($_GET['table']) -> where($_GET['where']) -> select();
        $this -> data = $info;
        $this -> count = count($info);
        $this -> display();
    }
}