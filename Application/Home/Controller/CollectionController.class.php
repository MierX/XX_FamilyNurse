<?php
namespace Home\Controller;
use Think\Controller;
//收藏
class CollectionController extends BaseController {
    public function index(){
        if($_GET) {
            if($_GET['role'] == 'User') {
                //实例化用户收藏表，查询数据
                $ids = json_decode(D('UserCollection') -> field('ids') -> where(['uid' => $_GET['id']]) -> find()['ids'],true);
                if(!$ids) {
                    //没有查询到数据，提示
                    echo "<script>alert('您没有收藏任何护士！')</script>";
                } else {
                    //实例化护士表，查询护士表中的id与收藏表中的ids字段中匹配的数据，且护士状态为正常
                    $nurse = D('Nurse') -> where(['id' => ['in', $ids], 'status' => 1]) -> select();
                    $this -> data = $nurse;
                    $this -> display();
                }
            } else if($_GET['role'] == 'Nurse') {
                ////实例化护士收藏表，查询数据
                $ids = json_decode(D('NurseCollection') -> field('ids') -> where(['nid' => $_GET['id']]) -> find()['ids'],true);
                if(!$ids) {
                    echo "<script>alert('您没有收藏任何需求！')</script>";
                } else {
                    $needs = D('Needs') -> where(['id' => ['in', $ids], 'status' => 1]) -> select();
                    //遍历数据
                    foreach ($needs as $k => &$v) {
                        if($v['endtime'] <= time()) {
                            //当前时间超过时效时间，将需求状态改为取消
                            $v['status'] = 4;
                            //保存数据
                            D('Needs') -> where(['id' => $v['id']]) -> save($v);
                            //销毁状态为取消的需求，不显示
                            unset($needs[$k]);
                            continue;
                        }
                        $user = D('User') -> field('name,status') -> where(['id' => $v['uid']]) -> find();
                        //若发布者被封号，收藏中不显示此条需求
                        if($user['status'] == 2) {
                            unset($needs[$k]);
                        } else {
                            $v['name'] = $user['name'];
                        }
                    }
                    //将数组变量的值传递到模板并渲染
                    $needs = array_values($needs);
                    $this -> data = $needs;
                    $this -> display();
                }
            }
        }
    }

    //用户收藏护士
    public function userCollection() {
        if($_GET) {
            //实例化数据表，查询账户状态为正常的护士信息
            $nurse = D('Nurse') -> field('status') -> where(['id' => $_GET['nurse'], 'status' => 1]) -> find()['status'];
            if($nurse) {
                //护士账号状态正常，则实例化数据表，查询此用户的收藏信息
                $info = D('UserCollection') -> field('id,ids') -> where(['uid' => $_GET['user']]) -> find();
                if(!$info['id']) {
                    //如果此用户未收藏护士，则将数据将数据赋值给以下变量
                    $data['uid'] = $_GET['user'];
                    $data['ids'] = json_encode([intval($_GET['nurse'])]);//获取此护士的工号
                    D('UserCollection') -> add($data);//实例化数据表，将数据写入数据库中
                } else {
                    //若此用户已收藏护士，赋值数据到以下变量
                    $info_id = $info['id'];
                    $info = json_decode($info['ids'],true);
                    if($_GET['status'] == true) {
                        //若为已收藏状态，销毁该条收藏，即取消收藏
                        unset($info[array_search(intval($_GET['nurse']),$info)]);
                        //实例化数据表，将数据集合保存到数据库
                        D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    } else if($_GET['status'] == false) {
                        //若为未收藏状态，添加收藏
                        $info[] = intval($_GET['nurse']);
                        //实例化数据表，将数据集合保存到数据库
                        D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    }
                }
                echo true;
            } else {
                echo 222;//没有查到数据，输出222？
            }
        } else {
            echo false;
        }
    }

    //护士收藏患者需求
    public function nurseCollection() {
        if($_GET) {
            //实例化数据表，查询需求状态为未开始的信息
            $needs = D('needs') -> field('status') -> where(['id' => $_GET['needs'], 'status' => 1]) -> find()['status'];
            if($needs) {
                //实例化数据表，查询此护士的收藏信息
                $info = D('NurseCollection') -> field('id,ids') -> where(['nid' => $_GET['nurse']]) -> find();
                if(!$info['id']) {
                    //如果护士未收藏该需求，将数据写入数据库中
                    $data['nid'] = $_GET['nurse'];
                    $data['ids'] = json_encode([intval($_GET['needs'])]);
                    D('NurseCollection') -> add($data);
                } else {
                    $info_id = $info['id'];
                    $info = json_decode($info['ids'],true);
                    if($_GET['status'] == true) {
                        //若需求为收藏状态，销毁该条收藏
                        unset($info[array_search(intval($_GET['needs']),$info)]);
                        //实例化数据表，将数据集合保存到数据库
                        D('NurseCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    } else if($_GET['status'] == false) {
                        //若为未收藏状态，添加收藏
                        $info[] = intval($_GET['needs']);
                        D('NurseCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    }
                }
                echo true;
            } else {
                echo false;//没有查到数据，返回 false
            }
        } else {
            echo false;
        }
    }

    public function info() {
        if($_GET['table']) {
            //实例化数据表，并查找数据
            $info = D($_GET['table']) -> field($_GET['field']) -> where(['id' => $_GET['id']]) -> find()[$_GET['field']];
            $needs = $_GET['id'];
            $nurse = $_GET['id'];
            $collection = true;
            //将控制器变量值传递到模板
            $this -> needs = $needs;
            $this -> nurse = $nurse;
            $this -> collection = $collection;
            $this -> info = $info;
        }
        $this -> display();
    }
}