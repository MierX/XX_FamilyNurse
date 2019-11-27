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

    public function setTime($time) {
        $nowTime = time();
        $differenceTime = $nowTime - $time;
        $yesterdayTime = strtotime('yesterday');
        $weekTime = strtotime(date('Y-m-d 0:0:0', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 36000)));
        if(date('Y-m-d', time()) == date('Y-m-d', $time)) {
            $rs = '今天'.date('H:i', $time);
        } else if(date('Y-m-d', $yesterdayTime) == date('Y-m-d', $time)) {
            $rs = '昨天'.date('H:i', $time);
        } else if($differenceTime < 60 * 60 * 24 * 7 && $time > $weekTime) {
            $newDay = date('w', $time);
            $week = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
            $rs = $week[$newDay]." ".date('H:i', $time);
        } else if(date('y', time()) == date('y', $time)) {
            $rs = date('m', $time).'月'.date('d', $time).'日'.' '.date('H:i', $time);
        } else {
            $rs = date('Y', $time).'年'.date('m', $time).'月'.date('d', $time).'日'.' '.date('H:i', $time);
        }
        return $rs;
    }
}