<?php
function getUserList1(){
    $userService = new UserService();
    $arr=$userService->getUserList();
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function getUserList($pageNow){
    $userService = new UserService();
    $pageCount=$userService->getPageCount();
    $pageNow=intval($pageNow);
    if($pageNow>$pageCount){
        $pageNow=$pageCount;
    }
    $fenyePage=$userService->getFenyePage($pageNow);
    $arr=$fenyePage->res_array;
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function getUserFenye(){
    if(!empty($_GET['pageNow'])){
        $pageNow=$_GET['pageNow'];
    }else{
        $pageNow=1;
    }
    $userService = new UserService();
    $pageCount=$userService->getPageCount();
    if($pageNow>=$pageCount){
        $pageNow=$pageCount;
    }
    $fenyePage=$userService->getFenyePage($pageNow);
    $arr=$fenyePage->navigate;
    echo $arr;
}
function checkUserName($username){
    $userService = new UserService();
    $arr=$userService->checkUser($username);
    return $arr;
}
function addUser(){
    if(empty($_POST['username'])){
        alertMes("请填写用户名，用户名不能为空","addUser.php");
    }
    if(empty($_POST['password'])){
        alertMes("密码不能为空，请重新填写","addUser.php");
    }
    $username=$_POST['username'];
    $isUserName=checkUserName($username);
    if($isUserName){
        alertMes("用户名已存在，请重新输入","addUser.php");
    }
    $password=md5($_POST['password']);
    $sex=$_POST['sex']?$_POST['sex']:2;
    $email=$_POST['email'];
    $regTime=date("Y-m-d H:i:s");
    $userService = new UserService();
    $arr=$userService->addUser($username,$password,$sex,$email,$regTime);
    if($arr==1){
        alertMes("添加用户成功","userList.php");
    }else{
        alertMes("添加用户失败，请重新添加","addUser.php");
    }
}
function getUserById($id){
    $userService = new UserService();
    $arr=$userService->getUserById($id);
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function editUserByAdmin($id){
    $userService = new UserService();
    $sex=$_POST['sex']?$_POST['sex']:2;
    $email=$_POST['email'];
    $arr=$userService->updateUserByAdmin($sex,$email,$id);
    if($arr==1){
        alertMes("更新成功","userList.php");
    }else{
        alertMes("更新失败，请重新修改","editUser.php?id=$id");
    }
}
function delUserById($id){
    $userService = new UserService();
    $res=$userService->delUserById($id);
    if($res==1){
        alertMes("删除成功","userList.php");
    }else{
        alertMes("删除失败，请重新操作","userList.php");
    }

}