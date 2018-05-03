<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-25
 * Time: 16:55
 */
require_once 'SqlHelper.class.php';
//该类是一个业务逻辑处理类，主要完成对user表的业务逻辑操作
//完成增删改查
class UserService{
    //查看是否已存在
    public function checkUser($username){
        $sql="select username from user where username='".$username."' limit 0,1";
        $SqlHelper = new SqlHelper();
        $res = $SqlHelper->execute_dql($sql);
        if ($res) {
            return $res[0]['username'];
        }
        $SqlHelper->close_connect();
        return "";
    }
    //添加
    function addUser($username,$password,$sex,$email,$regTime){
        $password=md5($password);
        $sql="insert into user(username,password,sex,email,regTime) values('".$username."','".$password."',".$sex.",'".$email."','".$regTime."')";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    //更新
    function updateUser($password,$sex,$email,$id){
        $password=md5($password);
        $sql="update user set password='$password',sex=$sex,email='$email' where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    function updateUserByAdmin($sex,$email,$id){
        $sql="update user set sex=$sex,email='$email' where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    //删除
    function delUserById($id){
        $sql="delete from user where id=$id";
        //创建SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        return $res;
    }
    //根据id获取一个信息
    function getUserById($id){
        $sql="select username,email,sex from user where id=$id";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr[0];
    }
    //获取用户列表
    function getUserList(){
        $sql="select id,username,sex,email,
regTime from user";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
    //提供一个函数可以获取共有多少页
    function getPageCount()
    {
        $pageSize=2;
        //需要查询$rowCount
        $sql = "select count(id) from user";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $res= intval($res[0]["count(id)"]);
        //这样就可以计算$pageCount
        if ($res) {
            $pageCount = ceil($res / $pageSize);
            return $pageCount;
        }else{
            return 1;
        }
    }
    //第二种使用封装的方式完成分页（业务逻辑在这里）
    function getFenyePage($pageNow){
        $fenyePage=new FenyePage();
        $fenyePage->pageNow=$pageNow;
        $fenyePage->pageSize=2;
        $fenyePage->gotoUrl="userList.php";
        //创建一个SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        $sql1="select * from user limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
        //如何排除sql错误
        //echo "$sql1";
        $sql2="select count(id) from user";
        $res=$sqlHelper->execute_dql_fenyepage($sql1,$sql2,$fenyePage);
        return $res;
    }
}