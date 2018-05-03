<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-26
 * Time: 23:32
 */
function getLastTime(){
    date_default_timezone_set("Asia/Chongqing");
    if(!empty($_COOKIE['lastVisit'])){
        //更新时间
        setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
        echo "你上次登录时间是".$_COOKIE['lastVisit'];
    }else{
        setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
        //说明用户是第一次登陆
        echo "你是第一次登陆";
    }
}
function getCookieVal($key){
    if(empty($_COOKIE["$key"])){
        return "";
    }else{
        return $_COOKIE["$key"];
    }
}
//把验证用户是否合法封装到函数
function checkUserValidate(){
    //session_start();
    if(empty($_SESSION['adminuser']) && empty($_COOKIE['adminuser'])){
        alertMes("请先登录","login.php?errno=0");
    }
}
//提示框
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}
//确认框
function confirmMes($mes,$url,$url1){
    echo "
<script>
    if(confirm('{$mes}')){
    window.location='{$url}';
    }else{
    window.location='{$url1}';
    }
</script>";
}
//上传
function upload1($file,$url){
    $_FILES=$file;
    $file_size=$_FILES['myfile']['size'];
    $filesize=abs(filesize($_FILES['myfile']['tmp_name']));
    if($file_size>2*1024*1024){
        alertMes("文件过大，不能上传大于2m文件",$url);
        exit();
    }
    $file_type=$_FILES['myfile']['type'];
    if($file_type!='image/jpg'&&$file_type!='image/pjpeg'&&$file_type!='image/jpeg'){
        alertMes("文件类型只能是jpg的",$url);
        exit();
    }
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
        $uploaded_file=$_FILES['myfile']['tmp_name'];
        $user_path=$_SERVER['DOCUMENT_ROOT']."/chanLily/upload/";
        if(!file_exists($user_path)){
            mkdir($user_path);
        }
        $file_str=substr($_FILES['myfile']['name'],strpos($_FILES['myfile']['name'],"."));
        $move_to_file=$user_path.time().rand(1,1000).$file_str;
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))){
            return $move_to_file;
        }else{
            alertMes("上传失败！",$url);
        }
    }else{
        alertMes("上传失败！",$url);
    }
}
function upload($file){
    $_FILES=$file;
    $file_size=$_FILES['myfile']['size'];
    $filesize=abs(filesize($_FILES['myfile']['tmp_name']));
    if($file_size>2*1024*1024){
        return 1;//文件过大，不能上传大于2m文件
    }
    $file_type=$_FILES['myfile']['type'];
    if($file_type!='image/jpg'&&$file_type!='image/pjpeg'&&$file_type!='image/jpeg'){
        return 2;//文件类型只能是jpg的
    }
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
        $uploaded_file=$_FILES['myfile']['tmp_name'];
        $user_path=$_SERVER['DOCUMENT_ROOT']."/chanLily/upload/";
        if(!file_exists($user_path)){
            mkdir($user_path);
        }
        $file_str=substr($_FILES['myfile']['name'],strpos($_FILES['myfile']['name'],"."));
        $a=time().rand(1,1000).$file_str;
        $move_to_file=$user_path.$a;
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))){
            return $a;
        }else{
            return 3;//上传失败
        }
    }else{
        return 3;//上传失败
    }
}