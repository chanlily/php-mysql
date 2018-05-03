<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-25
 * Time: 16:55
 */
require_once 'SqlHelper.class.php';
//该类是一个业务逻辑处理类，主要完成对admin表的业务逻辑操作
//完成增删改查
class albumService{
    //查看是否已存在
    public function checkAlbum($albumPath){
        $sql="select * from album where albumPath=$albumPath limit 1";
        $SqlHelper = new SqlHelper();
        $res = $SqlHelper->execute_dql($sql);
        if ($row = mysqli_fetch_assoc($res)) {
            return $row['albumPath'];
        }
        $SqlHelper->close_connect();
        return "";
    }
    //添加
    function addAlbum($albumPath,$pageId){
        $sql="insert into album(albumPath,pageId) values('$albumPath',$pageId)";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    //更新
    function updateAlbum($albumPath,$pageId,$id){
        $sql="update album set albumPath='$albumPath',pageId=$pageId where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //删除
    function delAlbumById($id){
        $sql="delete from album where id=$id";
        //创建SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        return $res;
    }

    //根据id获取一个雇员的信息
    function getAlbumById($id){
        $sql="select * from album where id=$id limit 1";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
}