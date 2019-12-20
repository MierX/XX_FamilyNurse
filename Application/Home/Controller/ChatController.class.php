<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends BaseController {
    public function index(){
        if($_GET) {
            $user = D('User') -> field('*') -> where(['id' => $_GET['uid']]) -> find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $_GET['nid']]) -> find();//D:跳到父页面
            $this -> user = $user;
            $this -> nurse = $nurse;
            $this -> display();//显示Home/Index/Index
        }
    }

    public function chatList() {
        if($_GET) {
            $chats = D('Chat') -> field('*') -> where(['uid' => $_GET['uid'], 'nid' => $_GET['nid']]) -> order('addtime asc') -> select();
            $v_t = 0;
            foreach ($chats as $key => &$value) {
                if($value['addtime'] - $v_t >= 300) {
                    $v_t = $value['addtime'];
                    $value['time'] = $this -> setTime($value['addtime']);
                } else {
                    $value['time'] = 1;
                }
            }
            $this -> chats = $chats;
            $this -> display();
        }
    }

    public function save() {
        if($_GET) {
            $rs = D('Chat') -> add(['uid' => $_GET['uid'], 'nid' => $_GET['nid'], 'author' => $_GET['author'], 'role' => $_GET['role'], 'content' => $_GET['content'], 'addtime' => time()]);
            if($rs) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function list() {
        if($_GET) {
            if($_GET['role'] == 'User') {
                $group = 'nid';
                $me = 'uid';
                $he = 'nid';
                $he_table = 'Nurse';
            } else if($_GET['role'] == 'Nurse') {
                $group = 'uid';
                $me = 'nid';
                $he = 'uid';
                $he_table = 'User';
            }
            $list = D('Chat') -> field('*') -> where([$me => $_GET['id']]) -> order('nid asc,addtime desc') -> select();
            $k = 0;
            foreach ($list as $key => $value) {
                if($value[$group] != $k) {
                    $k = $value[$group];
                    unset($value['id']);
                    $me_info = D($_GET['role']) -> field('id,name') -> where(['id' => $value[$me]]) -> find();
                    $value['me_id'] = $me_info['id'];
                    $value['me'] = $me_info['name'];
                    unset($value[$me]);
                    unset($value['author']);
                    unset($value['role']);
                    $he_info = D($he_table) -> field('id,name') -> where(['id' => $value[$he]]) -> find();
                    $value['he_id'] = $he_info['id'];
                    $value['he'] = $he_info['name'];
                    unset($value[$he]);
                    $info[] = $value;
                }
            }
            $addtime = array_column($info,'addtime');
            array_multisort($addtime,SORT_DESC,$info);
            $this -> info = $info;
            $this -> display();
        }
    }
}