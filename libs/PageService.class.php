<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-25
 * Time: 16:56
 */
require_once 'SqlHelper.class.php';
class PageService{
    //提供一个函数可以获取共有多少页
    function getPageCount(){
        $pageSize=5;
        //需要查询$rowCount
        $sql = "select count(id) from page";
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

    //一个函数可以获取应当现实的页数
    function  getPageListByPage($pageNow,$pageSize){
        $sql="select * from page limit ".($pageNow-1)*$pageSize.",$pageSize";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dql($sql);
        //关闭连接
        $sqlHelper->close_connect();
        return $res;
    }

    //第二种使用封装的方式完成分页
    function getPageFenyePage($pageNow){
        $fenyePage=new FenyePage();
        $fenyePage->pageNow=$pageNow;
        $fenyePage->pageSize=5;
        $fenyePage->gotoUrl="pageList.php";
        //创建一个SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        $sql1="select page.*,cate.cName from page LEFT JOIN cate ON page.cateId=cate.id limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
        //如何排除sql错误
        //echo "$sql1";
        $sql2="select count(id) from page";
        $res=$sqlHelper->execute_dql_fenyepage($sql1,$sql2,$fenyePage);
        return $res;
    }

    //根据输入的id删除
    function delPageById($id){
        $sql="delete from page where id=$id";
        //创建SqlHelper对象实例
        $sqlHelper=new SqlHelper();
        return $sqlHelper->execute_dml($sql);
    }

    //添加
    function addPage($userId,$author,$pageName,$pageView,$pageDesc,$pageUpTime,$isShow,$isHot,$cateId,$intro,$image,$sort){
            $sql="insert into page(userId,author,pageName,pageView,pageDesc,pageUpTime,isShow,isHot,cateId,intro,image,sort) values($userId,'".$author."','".$pageName."',$pageView,'".$pageDesc."','".$pageUpTime."',$isShow,$isHot,$cateId,'".$intro."','".$image."',$sort)";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //根据id获取的信息
    function getPageById($id){
        $sql="select * from page where id=$id";
        $sqlHelper=new SqlHelper();
        $arr = $sqlHelper->execute_dql($sql);
        $sqlHelper->close_connect();
        return $arr[0];
    }

    //更新
    function updatePage($userId,$author,$pageName,$pageView,$pageDesc,$pageUpTime,$isShow,$isHot,$cateId,$intro,$image,$sort,$id){
        if($image==""){
            $sql="update page set userId=$userId,author='".$author."',pageName='".$pageName."',pageView=$pageView,pageDesc='".$pageDesc."',pageUpTime='".$pageUpTime."',isShow=$isShow,isHot=$isHot,cateId=$cateId,intro='".$intro."',sort=$sort where id=$id";
        }else{
            $sql="update page set userId=$userId,author='".$author."',pageName='".$pageName."',pageView=$pageView,pageDesc='".$pageDesc."',pageUpTime='".$pageUpTime."',isShow=$isShow,isHot=$isHot,cateId=$cateId,intro='".$intro."',image='".$image."',sort=$sort where id=$id";
        }
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    //更新浏览次数
    function updatePageView($pageView,$id){
        $pageView++;
        $sql="update page set pageView=$pageView where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
}