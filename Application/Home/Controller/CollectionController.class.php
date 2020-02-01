<?php
namespace Home\Controller;
use Think\Controller;
class CollectionController extends BaseController {
    public function index(){
        if($_GET) {
            if($_GET['role'] == 'User') {
                $ids = json_decode(D('UserCollection') -> field('ids') -> where(['uid' => $_GET['id']]) -> find()['ids'],true);
                if(!$ids) {
                    echo "<script>alert('您没有收藏任何护士！')</script>";
                } else {
                    $nurse = D('Nurse') -> where(['id' => ['in', $ids], 'status' => 1]) -> select();
                    $this -> data = $nurse;
                    $this -> display();
                }
            } else if($_GET['role'] == 'Nurse') {
                $ids = json_decode(D('NurseCollection') -> field('ids') -> where(['nid' => $_GET['id']]) -> find()['ids'],true);
                if(!$ids) {
                    echo "<script>alert('您没有收藏任何需求！')</script>";
                } else {
                    $needs = D('Needs') -> where(['id' => ['in', $ids], 'status' => 1]) -> select();
                    foreach ($needs as $k => &$v) {
                        if($v['endtime'] <= time()) {
                            $v['status'] = 4;
                            D('Needs') -> where(['id' => $v['id']]) -> save($v);
                            unset($needs[$k]);
                            continue;
                        }
                        $user = D('User') -> field('name,status') -> where(['id' => $v['uid']]) -> find();
                        if($user['status'] == 2) {
                            unset($needs[$k]);
                        } else {
                            $v['name'] = $user['name'];
                        }
                    }
                    $needs = array_values($needs);
                    $this -> data = $needs;//将数据集合渲染到前端
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
                        //若护士账号状态正常，销毁数组中搜索的工号
                        unset($info[array_search(intval($_GET['nurse']),$info)]);
                        //实例化数据表，将数据集合保存到数据库
                        D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    } else if($_GET['status'] == false) {
                        //若护士账号状态非正常，将护士工号赋给数组
                        $info[] = intval($_GET['nurse']);
                        //实例化数据表，将数据集合保存到数据库
                        D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    }
                }
                echo true;
            } else {
                echo 222;
            }
        } else {
            echo false;
        }
    }

    public function nurseCollection() {
        if($_GET) {
            $needs = D('needs') -> field('status') -> where(['id' => $_GET['needs'], 'status' => 1]) -> find()['status'];
            if($needs) {
                $info = D('NurseCollection') -> field('id,ids') -> where(['nid' => $_GET['nurse']]) -> find();
                if(!$info['id']) {
                    $data['nid'] = $_GET['nurse'];
                    $data['ids'] = json_encode([intval($_GET['needs'])]);
                    D('NurseCollection') -> add($data);
                } else {
                    $info_id = $info['id'];
                    $info = json_decode($info['ids'],true);
                    if($_GET['status'] == true) {
                        unset($info[array_search(intval($_GET['needs']),$info)]);
                        D('NurseCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    } else if($_GET['status'] == false) {
                        $info[] = intval($_GET['needs']);
                        D('NurseCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                    }
                }
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }

    public function info() {
        if($_GET['table']) {
            $info = D($_GET['table']) -> field($_GET['field']) -> where(['id' => $_GET['id']]) -> find()[$_GET['field']];
            $needs = $_GET['id'];
            $nurse = $_GET['id'];
            $collection = true;
            $this -> needs = $needs;
            $this -> nurse = $nurse;
            $this -> collection = $collection;
            $this -> info = $info;
        }
        $this -> display();
    }
}