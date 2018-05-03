<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-25
 * Time: 11:54
 */
include "../include.php";
    $adminName=$_POST['adminId'];
    $password=$_POST['password'];
//    session_start();
    //接收验证码
    $checkCode=$_POST['checkCode'];
    if($checkCode!=$_SESSION['adminCheckCode']){
        alertMes("验证码错误，请重新输入","login.php?errno=2");
        //header("Location:login.php?errno=2");
        exit();
    }
//获取用户是否选中了保存id
//默认勾选值为on，如果没勾选是无，空
    if(empty($_POST['keep'])){
        if(!empty($_COOKIE['adminuser'])){
            setcookie("adminuser",$adminName,time()-100);
        }
    }else{
        setcookie("adminuser",$adminName,time()+7*2*24*3600);
    }

//实例化一个AdminService方法
    $adminService = new AdminService();
    $name="";
    if($name=$adminService->checkAdminLogined($adminName,$password)){
        $name=$adminService->checkAdminLogined($adminName,$password);
        //把登陆信息写入到cookie 'loginname':$name
        //session_start();
        $_SESSION['adminuser']=$name;
        header("Location:index.php?name=$name");
        exit();
    }else{
        alertMes("用户名或密码错误，请重新登陆","login.php?errno=1");
        //header("Location:login.php?errno=1");
        exit();
    }
