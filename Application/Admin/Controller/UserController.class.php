<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        $role = $_GET['role'];
        $this -> role = $role;
        $this -> display();
    }
}