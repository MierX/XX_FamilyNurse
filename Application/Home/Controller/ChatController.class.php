<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends BaseController {
    public function index(){
        if($_GET) {
            //实例化数据表，查找用户与护士信息
            $user = D('User') -> field('*') -> where(['id' => $_GET['uid']]) -> find();
            $nurse = D('Nurse') -> field('*') -> where(['id' => $_GET['nid']]) -> find();
            $this -> user = $user;
            $this -> nurse = $nurse;
            $this -> display();//显示Home/Index/Index
        }
    }

    //查看留言信息
    public function chatList() {
        if($_GET) {
            //实例化留言表，查询数据
            $chats = D('Chat') -> field('*') -> where(['uid' => $_GET['uid'], 'nid' => $_GET['nid']]) -> order('addtime asc') -> select();
            $v_t = 0;
            foreach ($chats as $key => &$value) {
                if($value['addtime'] - $v_t >= 300) {
                    //若当前留言时间与上一条留言时间相隔300秒，将当前时间赋给变量
                    $v_t = $value['addtime'];
                    //进行时间转换
                    $value['time'] = $this -> setTime($value['addtime']);
                } else {
                    $value['time'] = 1;
                }
            }
            $this -> chats = $chats;
            $this -> display();
        }
    }

    //保存留言
    public function save() {
        if($_GET) {
            //实例化留言表，将数据写入数据库
            $rs = D('Chat') -> add(['uid' => $_GET['uid'], 'nid' => $_GET['nid'], 'author' => $_GET['author'], 'role' => $_GET['role'], 'content' => $_GET['content'], 'addtime' => time()]);
            if($rs) {
                //写入成功
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    //留言列表
    public function list() {
        if($_GET) {
            //判断发送者与接收者
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
            //实例化留言表，查询发送者的留言信息
            $list = D('Chat') -> field('*') -> where([$me => $_GET['id']]) -> order('nid asc,addtime desc') -> select();
            $k = 0;
            foreach ($list as $key => $value) {
                if($value[$group] != $k) {
                    //若有对方id，将id赋值
                    $k = $value[$group];
                    //销毁id值
                    unset($value['id']);
                    //实例化数据表，查找接收者的信息
                    $me_info = D($_GET['role']) -> field('id,name') -> where(['id' => $value[$me]]) -> find();
                    $value['me_id'] = $me_info['id'];
                    $value['me'] = $me_info['name'];
                    //销毁下列变量值
                    unset($value[$me]);
                    unset($value['author']);
                    unset($value['role']);
                    //实例化数据表，查找发送者的信息
                    $he_info = D($he_table) -> field('id,name') -> where(['id' => $value[$he]]) -> find();
                    $value['he_id'] = $he_info['id'];
                    $value['he'] = $he_info['name'];
                    //销毁以下变量值
                    unset($value[$he]);
                    $info[] = $value;
                }
            }
            //将$info数组的“addtime”列信息赋值给$addtime
            $addtime = array_column($info,'addtime');
            //为$addtime和$info两个数组进行降序排序
            array_multisort($addtime,SORT_DESC,$info);
            $this -> info = $info;
            $this -> display();
        }
    }
}