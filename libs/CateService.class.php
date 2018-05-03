<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-25
 * Time: 16:55
 */
require_once 'SqlHelper.class.php';
//该类是一个业务逻辑处理类，主要完成对cate表的业务逻辑操作
//完成增删改查
class CateService{
    //查看是否已存在
    public function checkCate($cName){
        $sql="select * from cate where cName='".$cName."' limit 0,1";
        $SqlHelper = new SqlHelper();
        $res = $SqlHelper->execute_dql($sql);
        if ($res) {
            return $res[0]['cName'];
        }
        $SqlHelper->close_connect();
        return "";
    }
    //添加
    function addCate($cName,$sort){
        $sql="insert into cate(cName,sort) values('".$cName."',$sort)";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    //更新
    function updateCate($cName,$sort,$id){
        $sql="update cate set cName='$cName',sort=$sort where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    //删除
    function delCateById($id){
        $sql="delete from cate where id=$id";
        //创建SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        return $res;
    }

    //根据id获取一个的信息
    function getCateById($id){
        $sql="select * from cate where id=$id limit 0,1";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr[0];
    }

    //获取列表
    function getCateList(){
        $sql="select * from cate";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
}