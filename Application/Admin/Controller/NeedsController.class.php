<?php
namespace Admin\Controller;

use Think\Controller;

class NeedsController extends BaseController {
    public function index() {
        $value = parent::index();
        $table = $value[0];
        $info_list = $value[2];
        foreach ($info_list as $k => &$v) {
            if($v['endtime'] <= time()) {
                if($v['status'] == 1) {
                    $v['status'] = 4;
                    D('Needs') -> where(['id' => $v['id']]) -> save($v);
                }
            }
            $user = D('User') -> field('name,status') -> where(['id' => $v['uid']]) -> find();
            $v['name'] = $user['name'];
            if($v['status'] == 3 || $v['status'] == 2) {
                unset($info_list[$k]);
            }
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
        $info_list = $value[2];
        foreach ($info_list as $k => &$v) {
            if($v['endtime'] <= time()) {
                if($v['status'] == 1) {
                    $v['status'] = 4;
                    D('Needs') -> where(['id' => $v['id']]) -> save($v);
                }
                unset($info_list[$k]);
                continue;
            }
            $user = D('User') -> field('name,status') -> where(['id' => $v['uid']]) -> find();
            if($user['status'] == 2) {
                unset($info_list[$k]);
            } else {
                $v['name'] = $user['name'];
            }
        }
        $info_list = array_values($info_list);
        $count = count($info_list);
        $this -> table = $value[0];
        $this -> count = $count;
        $this -> data = $info_list;
        $this -> display('index');
    }
}