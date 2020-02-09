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
        //公告修改成功后刷新父窗口，关闭子窗口
        echo "<script>parent.location.reload();</script>";
    }

    public function info() {
        $info = parent::info();
        $this -> data = $info;
        $this -> display();
    }

    public function search() {
        $value = parent::search();
        //将控制器变量传递到模板
        $this -> table = $value[0];
        $this -> count = $value[1];
        $this -> data = $value[2];
        $this -> display('index');
    }
}