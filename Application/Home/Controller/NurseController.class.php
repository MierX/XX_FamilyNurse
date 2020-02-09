<?php
namespace Home\Controller;
use Think\Controller;
class NurseController extends BaseController {
    public function index() {
        //实例化护士表，并查询护士信息
        $info = D('Nurse') -> field('name,remark') -> where(['id' => $_GET['id']]) -> find();
        //设置查询条件为用户id
        $where = ['uid' => $_SESSION['id']];
        //若登录者为护士，查询条件即为护士id
        if($_SESSION['role'] == 'Nurse') $where = ['nid' => $_SESSION['id']];
        //实例化收藏表，依据查询条件进行查询
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where($where) -> find()['ids'],true);
        //检查$collections数组中是否有$_GET['id']值
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        //将数据集合渲染到前端
        $this -> collection = $collection;
        $this -> nurse = $_GET['id'];
        $this -> data = $info;
        $this -> display();
    }

    //查看我的需求
    public function myNeeds() {
        if($_GET['id']) {
            $needs = D('NurseNeeds') -> field('nid') -> where(['nurse' => $_GET['id']]) -> order('id asc') -> select();
            $needs =array_column($needs,'nid');
            if($needs) {
                if($_GET['list']) {
                    $need_list = D('Needs') -> field('*') -> where(['id' => ['in', $needs], 'status' => ['in', [2,3]]]) -> order('id asc') -> select();
                    $this -> needs = $need_list;
                    $this -> display();
                } else {
                    echo true;
                }
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
}