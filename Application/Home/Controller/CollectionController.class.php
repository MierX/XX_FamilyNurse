<?php
namespace Home\Controller;
use Think\Controller;
class CollectionController extends BaseController {
    public function index(){
        if($_GET) {
            if($_GET['role'] = 'User') {
                $ids = json_decode(D('UserCollection') -> field('ids') -> where(['uid' => $_GET['id']]) -> find()['ids'],true);
                if(!$ids) {
                    echo "<script>alert('您没有收藏任何护士！')</script>";
                } else {
                    $nurse = D('Nurse') -> where(['id' => ['in', $ids], 'status' => 1]) -> select();
                    $this -> data = $nurse;
                    $this -> display();
                }
            }
        }
    }

    public function userCollection() {
        if($_GET) {
            $info = D('UserCollection') -> field('id,ids') -> where(['uid' => $_GET['user']]) -> find();
            if(!$info['id']) {
                $data['uid'] = $_GET['user'];
                $data['ids'] = json_encode([intval($_GET['nurse'])]);
                D('UserCollection') -> add($data);
            } else {
                $info_id = $info['id'];
                $info = json_decode($info['ids'],true);
                if($_GET['status'] == true) {
                    unset($info[array_search(intval($_GET['nurse']),$info)]);
                    D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                } else if($_GET['status'] == false) {
                    $info[] = intval($_GET['nurse']);
                    D('UserCollection') -> where(['id' => $info_id]) -> save(['ids' => json_encode($info)]);
                }
            }
            echo true;
        } else {
            echo false;
        }
    }

    public function nurseInfo() {
        if($_GET['table']) {
            $info = D('Nurse') -> field('remark') -> where(['id' => $_GET['id']]) -> find()['remark'];
            $this -> info = $info;
        }
        $this -> display('info');
    }
}