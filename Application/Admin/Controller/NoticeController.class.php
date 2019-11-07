<?php
namespace Admin\Controller;

use Think\Controller;

class NoticeController extends BaseController {
    public function index() {
        parent::index();
        $this -> display('index');
    }

    public function edit() {
        parent::edit();
        $this -> index();
    }

    public function info() {
        parent::info();
        $this -> display();
    }

    public function search() {
        parent::search();
        $this -> display('index');
    }
}