<?php
function checkIsAdmin(){
    $name="";
    if($_SESSION['adminuser']||$_COOKIE['adminuser']){
        if($_SESSION['adminuser']){
            $name=$_SESSION['adminuser'];
        }else{
            $name=$_COOKIE['adminuser'];
        }
    }else{
        alertMes("请登录","login.php");
    }
    $adminService = new AdminService();
    if($adminService->checkAdminNum($name)){
        $isAdmin=$adminService->checkAdminNum($name);
    }else{
        $isAdmin=0;
    }
    return $isAdmin;
}
function checkAdminByName($username){
    $userService = new AdminService();
    $arr=$userService->checkAdmin($username);
    return $arr;
}
function getAdminList(){
    $adminService = new AdminService();
    $isAdmin = checkIsAdmin();
    if($isAdmin >= 1){
        $arr=$adminService->getAdminList();
        header("content-type:text/json");
        echo json_encode($arr);
        exit();
    }else{
        return "";
    }
}
function addAdmin(){
    if(empty($_POST['username'])){
        alertMes("请填写用户名，用户名不能为空","addUser.php");
    }
    $username=$_POST['username'];
    if(checkAdminByName($username)){
        alertMes("用户名已存在，请重新输入","addAdmin.php");
    }
    $password=md5($_POST['password']);
    $isAdmin=$_POST['isAdmin'];
    $adminService = new AdminService();
    $arr=$adminService->addAdmin($username,$password,$isAdmin);
    if($arr==1){
        alertMes("添加管理员成功","adminList.php");
    }else{
        alertMes("添加管理员失败，请重新添加","addAdmin.php");
    }
}
function getAdminById($id){
    $adminService = new AdminService();
    $arr=$adminService->getAdminById($id);
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function delAdminById($id){
    $adminService = new AdminService();
    $arr=$adminService->delAdminById($id);
    if($arr==1){
        alertMes("删除管理员成功","adminList.php");
    }else{
        alertMes("删除管理员失败，请重新编辑","adminList.php");
    }
}
function editAdmin($id){
    $isAdmin=$_POST['isAdmin'];
    $adminService = new AdminService();
    $arr=$adminService->updateAdmin($isAdmin,$id);
    if($arr==1){
        alertMes("修改管理员成功","adminList.php");
    }else{
        alertMes("修改管理员失败，请重新编辑","editAdmin.php?id=$id");
    }
}
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminuser'])){
        setcookie("adminuser","",time()-1);
    }
    session_destroy();
    alertMes("安全退出成功","login.php");
}