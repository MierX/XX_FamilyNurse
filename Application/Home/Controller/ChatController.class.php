<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends BaseController {
    public function index(){
        if($_GET) {
            $user = D('User') -> field('*') -> where(['id' => $_GET['uid']]) -> find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $_GET['nid']]) -> find();
            $this -> user = $user;
            $this -> nurse = $nurse;
            $this -> display();
        }
    }

    public function chatList() {
        if($_GET) {
            $chats = D('Chat') -> field('*') -> where(['uid' => $_GET['uid'], 'nid' => $_GET['nid']]) -> order('addtime asc') -> select();
            $this -> chats = $chats;
            $this -> display();
        }
    }

    public function save() {
        if($_GET) {
            $rs = D('Chat') -> add(['uid' => $_GET['uid'], 'nid' => $_GET['nid'], 'author' => $_GET['author'], 'content' => $_GET['content'], 'addtime' => time()]);
            if($rs) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}