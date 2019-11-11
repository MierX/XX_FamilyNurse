<?php
namespace Admin\Controller;

use Think\Controller;

class NoticeController extends BaseController {
    public function index() {
        $value = parent::index();
        $table = $value[0];
        $count = $value[1];
        $info_list = $value[2];
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
        $this -> table = $value[0];
        $this -> count = $value[1];
        $this -> data = $value[2];
        $this -> display('index');
    }
}