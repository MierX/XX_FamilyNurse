<?php
namespace Admin\Controller;

use Think\Controller;

class NeedsController extends BaseController {
    public function index() {
        $value = parent::index();
        //获取父类index方法中的$table值
        $table = $value[0];
        //获取父类index方法中的$info_list值
        $info_list = $value[2];
        //遍历表中数据
        foreach ($info_list as $k => &$v) {
            //如果失效时间小于当前时间，将未开始的需求改为取消状态
            if($v['endtime'] <= time()) {
                if($v['status'] == 1) {
                    $v['status'] = 4;
                    D('Needs') -> where(['id' => $v['id']]) -> save($v);
                }
            }
            //查询发布用户的姓名和状态
            $user = D('User') -> field('name,status') -> where(['id' => $v['uid']]) -> find();
            $v['name'] = $user['name'];
            //状态为未完成或已完成的需求不显示
            if($v['status'] == 3 || $v['status'] == 2) {
                unset($info_list[$k]);
            }
        }
        //返回$info_list数组的所有值
        $info_list = array_values($info_list);
        $count = count($info_list);
        //等效于$this->assign('table',$table);
        //将控制器变量传递给模板
        $this -> table = $table;
        $this -> count = $count;
        $this -> data = $info_list;
        //模板渲染
        $this -> display('index');
    }

    public function edit() {
        parent::edit();
        $this -> index();
    }

    public function info() {
        $info = parent::info();
        //将控制器变量赋值给模板
        $this -> data = $info;
        $this -> display();
    }

    //关键词搜索
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
            //如果用户的状态为封号，不显示该用户的需求
            if($user['status'] == 2) {
                unset($info_list[$k]);
            } else {
                $v['name'] = $user['name'];
            }
        }
        $info_list = array_values($info_list);
        $count = count($info_list);
        //将数据渲染到前端
        $this -> table = $value[0];
        $this -> count = $count;
        $this -> data = $info_list;
        $this -> display('index');
    }
}