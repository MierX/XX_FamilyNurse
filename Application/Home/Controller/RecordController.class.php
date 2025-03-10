<?php
namespace Home\Controller;
use Think\Controller;
class RecordController extends BaseController {
    public function index(){
        if($_GET) {
            //实例化需求表，查询数据
            $info = D('Needs') -> field('id,uid,disease,reward,worktime,status') -> where(['id' => $_GET['needs']]) -> find();
            //合并查找需求表与用户表后的数组数据
            $info = array_merge($info, D('User') -> field('name as u_name, sex as u_sex, age as u_age, phone as u_phone') -> where(['id' => $info['uid']]) -> find());
            //合并需求表、用户表、护士表数组数据
            $info = array_merge($info, D('Nurse') -> field('id as nid, name as n_name, sex as n_sex, age as n_age, phone as n_phone, work-year, work-add, work-expertise,merits') -> where(['id' => $_GET['nid']]) -> find());
            //查找记录中此需求的用户评分
            $info['ntou'] = D('Accept') -> field('ntou') -> where(['needs' => $_GET['needs']]) -> find()['ntou'];
            $this -> info = $info;
            $this -> display();
        }
    }

    //记录列表
    public function list() {
        if($_GET) {
            //判断当前用户角色，生成条件语句
            $_GET['role'] == 'User' ? $where = ['uid' => $_GET['id']] : $where = ['nid' => $_GET['id']];
            //实例化记录表，查询数据并按开始时间、结束时间、id排序
            $info = D('Accept') -> field('*') -> where($where) -> order('addtime asc,endtime asc,id asc') -> select();
            foreach ($info as $key => &$value) {
                //用户姓名
                $value['uid_name'] = D('User') -> field('name') -> where(['id' => $value['uid']]) -> find()['name'];
                $value['nid_name'] = D('Nurse') -> field('name') -> where(['id' => $value['nid']]) -> find()['name'];
                //需求标题
                $value['needs_name'] = D('Needs') -> field('title') -> where(['id' => $value['needs']]) -> find()['title'];
                //需求状态
                $value['status'] = D('Needs') -> field('status') -> where(['id' => $value['needs']]) -> find()['status'];
            }
            $this -> info = $info;
            $this -> display();
        }
    }

    //患者需求内容
    public function content() {
        //实例化需求表，查询数据
        $info = D('Needs') -> field('*') -> where(['id' => $_GET['id']]) -> find();
        $this -> info = $info;
        $this -> display();
    }

    //医护记录
    public function record() {
        //实例化医嘱表，查询医嘱记录，按记录开始时间降序排序
        $info = D('Record') -> field('*') -> where(['needs' => $_GET['id']]) -> order('addtime desc') -> select();
        $this -> info = $info;
        $this -> display();
    }

    //存储医嘱信息
    public function save() {
        if($_GET) {
            //实例化医嘱表，将护士所填的医嘱写入数据库
            $rs = D('Record') -> add(['needs' => $_GET['id'], 'content' => $_GET['value'], 'addtime' => time()]);
            echo $rs;
        }
    }

    //绩效核算
    public function saveScore() {
        if($_GET) {
            //实例化记录表，将评价分数存储到数据库中
            $rs = D('Accept') -> where(['needs' => $_GET['id']]) -> save(['score' => $_GET['score'], 'endtime' => time()]);
            if($rs) {
                //实例化需求表，将需求状态改为已完成
                D('Needs') -> where(['id' => $_GET['id']]) -> save(['status' => 3]);
                //实例化护士表，将绩效（评分-2）存储到数据库中
                D('Nurse') -> where(['id' => $_GET['nid']]) -> setInc('merits',$_GET['score']-2);
            }
            echo $rs;
        }
    }

    //存储护士对用户的评分
    public function saveScoreNurse() {
        if($_GET) {
            //实例化用户表，用户的评分累加上当前评分
            $rs = D('User') -> where(['id' => $_GET['uid']]) -> setInc('score',$_GET['score']-2);
            //实例化记录表，将用户评分存储到数据库
            if($rs) D('Accept') -> where(['needs' => $_GET['id']]) -> save(['ntou' => $_GET['score']-2]);
            echo $rs;
        }
    }
}