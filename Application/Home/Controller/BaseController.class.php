<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    //初始化方法
    public function _initialize() {
        //查询账户状态与登录状态
        if(($_SESSION['role'] == 'User' || $_SESSION['role'] == 'Nurse') && $_SESSION['account'] && $_SESSION['name']) {
            $status = D($_SESSION['role']) -> where(['id' => $_SESSION['id']]) -> field('status') -> find()['status'];
            if($status != 1) {
                session(null);
                //封号状态，提示
                echo "<script>alert('当前账号已被停用！');parent.location.reload();</script>";
            }
        } else {
            $this -> error('请先登录！',U('Index/login'));
        }
    }

    public function index(){
    }

    //时间转换
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