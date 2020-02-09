<?php
namespace Home\Controller;
use Think\Controller;
class NeedsController extends BaseController {
    public function index() {
        //实例化数据表，查找数据
        $info = D('Needs')  -> field('uid,needs') -> where(['id' => $_GET['id']]) -> find();
        $info['name'] = D('User') -> field('name') -> where(['id' => $info['uid']]) -> find()['name'];
        // 生成条件语句
        $where = ['uid' => $_SESSION['id']];
        //若登录者为护士，则以护士工号生成条件语句
        if($_SESSION['role'] == 'Nurse') $where = ['nid' => $_SESSION['id']];
        //查找登录者的收藏列表
        $collections = json_decode(D($_SESSION['role'].'Collection') -> field('ids') -> where($where) -> find()['ids'],true);
        //判断$collections数组中存在$_GET['id']
        in_array($_GET['id'],$collections) ? $collection = true : $collection = false;
        $apply_list = D('Apply') -> field('nurse') -> where(['needs' => $_GET['id']]) -> order('addtime asc') -> select();
        // 遍历数据集合，遍历申请此需求的所有护士
        foreach ($apply_list as $key => $value) {
            $nurse = D('Nurse') -> field('id as nid,name') -> where(['id' => $value['nurse'], 'status' => 1]) -> find();
            if($nurse) $applyer[] = $nurse;
        }
        //将控制器变量值传递到模板
        $this -> applyer = $applyer;
        $this -> collection = $collection;
        $this -> needs = $_GET['id'];
        $this -> data = $info;
        //调用与这个方法同名，且属于当前控制器的对应模板
        $this -> display();
    }

    //发布需求
    public function edit() {
        if($_GET['id']) {
            $user = D('User') -> field('*') -> where(['id' => $_GET['id']]) -> find();//实例化用户表，并查询所有表字段
            if($user['sex'] == 1) {
                $user['sex'] = '男';
            } else {
                $user['sex'] = '女';
            }
            //销毁$_POST、$_GET值
            unset($_POST);
            unset($_GET);
        }
        //将查询的数据集合渲染到前端的user变量
        $this -> user = $user;
        $addtime = time();//获取当前时间，并赋值给发布时间
        $endtime = strtotime('+1 week');//失效时间为发布时间+1周
        //将发布时间和失效时间渲染到前端
        $this -> addtime = $addtime;
        $this -> endtime = $endtime;
        if($_POST) {
            //若表单数据提交成功，将发布时间和失效时间变量赋值给表单的发布时间和失效时间            
            $_POST['addtime'] = $addtime;
            $_POST['endtime'] = $endtime;
            if(!$_POST['needs']) $_POST['needs'] = '无';//若表单提交的需求数据为空，则默认“无”
            $rs = D('Needs') -> add($_POST);//实例化数据库患者需求表，将数据写入数据库
            if($rs) {
                //发布成功后刷新父窗体并关闭子窗体
                echo "<script>alert('发布成功！');parent.location.reload();</script>";
            } else {
                //发布失败刷新父窗体并关闭子窗体
                echo "<script>parent.location.reload();</script>";
            }
        }
        $default = "<p>与患者关系：</p>
						<p>患者姓名：</p>
						<p>健康状态：</p>
						<p>性别：</p>
						<p>年龄：</p>
						<p>现在居住地：</p>";
        $this -> dfContent = $default;//将默认的需求内容渲染到前端dfContent变量
        $this -> display();//显示Needs/index.html
    }

    //修改需求
    public function editNeeds() {
        if($_GET['id']) {
            $info = D("Needs") -> field('*') -> where(['id' => $_GET['id']]) -> find();//实例化患者需求表，并查询所有表字段
            $user = D('User') -> field('*') -> where(['id' => $info['uid']]) -> find();//实例化用户表，并查询所有表字段
            if($user['sex'] == 1) {
                $user['sex'] = '男';
            } else {
                $user['sex'] = '女';
            }
        }
        //将查询的数据集合渲染到前端的info和user变量
        $this -> info = $info;
        $this -> user = $user;
        $addtime = time();//获取当前时间，并赋值给修改时间
        $endtime = strtotime('+1 week');//失效时间为修改时间+1周
        //将发布时间和失效时间渲染到前端
        $this -> addtime = $addtime;
        $this -> endtime = $endtime;
        if($_POST) {
            //若表单数据提交成功，将修改时间和失效时间变量赋值给表单的发布时间和失效时间
            $_POST['addtime'] = $addtime;
            $_POST['endtime'] = $endtime;
            $_POST['status'] = 1;//默认需求状态为开启
            if(!$_POST['needs']) $_POST['needs'] = '无';//如果表单的需求数据为空，则默认“无”
            $rs = D('Needs') -> save($_POST, ['id' => $_POST['id']]);//实例化数据库表，将数据保存到患者需求表中
            if($rs) {
                //修改成功后刷新父窗体并关闭子窗体
                echo "<script>alert('修改成功，已重新发布！');parent.location.reload();</script>";
            } else {
                echo "<script>parent.location.reload();</script>";//修改失败，刷新父窗体并关闭子窗体
            }
        }
        $this -> display();
    }

    //关闭需求
    public function offNeeds() {
        if($_GET) {
            //将患者需求状态改为取消
            $rs = D('Needs') -> where(['id' => $_GET['id']]) -> save(['status' => 4]);
            if($rs) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }

    //检查需求申请状态，提出申请
    public function checkStatus() {
        if($_GET) {
            //实例化数据表，查询此申请的id
            $rs = D('Apply') -> field('id') -> where(['needs' => $_GET['id'], 'nurse' => $_GET['nid']]) -> find();
            if($rs) {
                //数据表中已存在此申请，返回false
                echo false;
            } else {
                //数据表中不存在此申请，写入数据库
                D('Apply') -> add(['needs' => $_GET['id'], 'nurse' => $_GET['nid'], 'addtime' => time()]);
                echo true;
            }
        }
    }

    //接受需求申请
    public function accept() {
        if($_GET) {
            //实例化数据表，查询此接受记录
            $rs = D('Accept') -> field('id') -> where(['needs' => $_GET['needs'], 'uid' => $_GET['user'], 'nid' => $_GET['nurse']]) -> find();
            if($rs) {
                //若已有接受记录，则返回false
                echo false;
            } else {
                //若没有接受记录，将数据写入数据库中
                D('Accept') -> add(['needs' => $_GET['needs'], 'uid' => $_GET['user'], 'nid' => $_GET['nurse'], 'addtime' => time()]);
                D('Needs') -> where(['id' => $_GET['needs']]) -> save(['status' => 2]);//修改需求状态
                D('Apply') -> where(['needs' => $_GET['needs']]) -> delete();//删除申请
                echo true;
            }
        }
    }
}