<?php
namespace Home\Controller;
use Think\Controller;
class NoticeController extends BaseController {
    public function index() {
    	//实例化数据表，查询数据
        $info = D('Notice') -> field('content') -> where(['id' => $_GET['id']]) -> find();
        //实例化数据表，查询数据，热度排序为降序
        D('Notice') -> where(['id' => $_GET['id']]) -> setInc('hot');
        //将数据集合渲染到前端
        $this -> data = $info;
        //显示Notice/index.html
        $this -> display();
    }
}