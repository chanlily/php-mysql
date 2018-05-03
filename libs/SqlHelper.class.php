<?php
//这是一个工具类，作用是对数据库的操作
require_once '../include.php';
class SqlHelper{
    private $conn;
    private $dbname=DB_DBNAME;
    private $username=DB_USER;
    private $password=DB_PWD;
    private $host=DB_HOST;
    private $charser=DB_CHARSET;

    public function __construct()
    {
        $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
        if(!$this->conn){
            die("连接失败".mysqli_error($this->conn));
        }
        mysqli_query($this->conn,"set names utf8");
    }
    //执行dql语句
    public function execute_dql2($sql){
        $res=mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        return $res;
    }
    //可以释放资源
    //执行dql语句，但是返回的是一个数组
    public function execute_dql($sql){
        $arr=array();
        $res=mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));
        //$i=0;
        //把$res=>$arr，把结果集内容转移到一个数组中
        while($row=mysqli_fetch_assoc($res)){
            //$arr[$i++]=$row;
            $arr[]=$row;
        }
        mysqli_free_result($res);
        return $arr;
    }
    //考虑分页情况的查询,这是一个比较通用的并体现
    public function execute_dql_fenyepage($sql1,$sql2,$fenyePage){
        //这里我们查询到了要分页的数据
        $res=mysqli_query($this->conn,$sql1) or die(mysqli_error($this->conn));
        //$res=>array()
        $arr=array();
        //把res转移到$arr
        while($row=mysqli_fetch_assoc($res)){
            $arr[]=$row;
        }
        mysqli_free_result($res);
        $res2=mysqli_query($this->conn,$sql2) or die(mysqli_error($this->conn));

        if($row=mysqli_fetch_row($res2)){
            $fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
            $fenyePage->rowCount=$row[0];
        }
        mysqli_free_result($res2);
        //把导航信息也封装
        $fenyePage->navigate="<div class='pageNavigate'>";
        if($fenyePage->pageNow>1){
            $prePage=$fenyePage->pageNow-1;
            $fenyePage->navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp;&nbsp;&nbsp;";
        }
        //整体向前翻页
        $page_whole=5;
        $start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
        $index=$start;
        //前提
        //如果当前$pageNow在1-10页数之内，就没有向前翻动
        if($fenyePage->pageNow>$page_whole){
            $fenyePage->navigate.= "&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'>&laquo;</a>";
        }
        //定$start：1->10, 11->20
//向下取整数 1->10  floor((pageNow-1)/10)=0；
//11->20： floor((pageNow-1)/10)=1；
        //最后一页
        if($index+$page_whole>$fenyePage->pageCount){
            $page_whole=$fenyePage->pageCount-$index+1;
        }
        //echo "$start";
        //echo "$pageLast";
        if($fenyePage->pageNow>1){
            for(;$start<$index+$page_whole;$start++){
                $fenyePage->navigate.=  "<a href='{$fenyePage->gotoUrl}?pageNow=$start'>$start</a>";
            }
        }
        //整体10页翻动
        if($start <= $fenyePage->pageCount && $fenyePage->pageNow>1){
            $fenyePage->navigate.=  "&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$start'>&raquo;</a>";
        }
        if($fenyePage->pageNow<$fenyePage->pageCount){
            $nextPage=$fenyePage->pageNow+1;
            $fenyePage->navigate.= "<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页</a>";
        }
        //显示当前页和共有多少页
        $fenyePage->navigate.=  "<span>当前第{$fenyePage->pageNow}页/共{$fenyePage->pageCount}页</span></div>";
        //把$arr赋值给$fenyepage
        $fenyePage->res_array=$arr;
        return $fenyePage;
    }

    //执行dml语句
    public function execute_dml($sql){
        $b=mysqli_query($this->conn,$sql) or die("连接失败".mysqli_error($this->conn));
        if(!$b){
            return 0;//表示失败
        }else{
            if(mysqli_affected_rows($this->conn)){
                return 1;//表示执行成功
            }else{
                return 2;//表示没有行受到影响
            }
        }
    }
    //关闭连接的方法
    public function close_connect(){
        if(!empty($this->conn)){
            mysqli_close($this->conn);
        }
    }
}