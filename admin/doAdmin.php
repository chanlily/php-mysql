<?php
require_once '../include.php';
checkUserValidate();
if(!empty($_GET['act'])){
    $act=$_GET['act'];
}else{
    $act="";
}
if(!empty($_GET['id'])){
    $id=$_GET['id'];
}else{
    $id=0;
}
if(!empty($_GET['pageNow'])){
    $pageNow=$_GET['pageNow'];
}else{
    $pageNow=1;
}
if(!empty($_SESSION['adminuser'])){
    $name= $_SESSION['adminuser'];
}
else if(!empty( $_COOKIE['adminuser'])){
    $name= $_COOKIE['adminuser'];
}else{
    $name="";
}
if($act=='getAdminList'){
    if(checkIsAdmin()>=1) {
        getAdminList();
    }else{
        return "";
    }
}
else if($act=='logout'){
    logout();
}
else if($act=='addAdmin'){
    addAdmin();
}
else if($act=='editAdmin'){
    editAdmin($id);
}
else if($act=='getAdminById'){
    getAdminById($id);
}
else if($act == 'delAdmin'){
    if(checkIsAdmin()<1) {
        alertMes("你没有权限操作","index.php");
    }
    confirmMes("你确定要删除这个管理员吗","doAdmin.php?act=delAdminById&id=$id","adminList.php");
}
else if($act == 'delAdminById'){
    delAdminById($id);
}
else if($act=='getUserList'){
    getUserList($pageNow);
}
else if($act=='addUser'){
    addUser();
}
else if($act=='editUser'){
    editUserByAdmin($id);
}
else if($act=='getUserById'){getUserById($id);}
else if($act=='delUser') {
    confirmMes("你确定要删除这个用户吗", "doAdmin.php?act=delUserById&id=$id", "userList.php");
}else if($act=='delUserById'){
    delUserById($id);
}
else if($act=='getPageList'){
    if(!empty($_GET['pageNow'])){
        $pageNow=$_GET['pageNow'];
    }else{
        $pageNow=1;
    }
    getPageList($pageNow);
}
else if($act=='addPage'){
    addPage();
}
else if($act=='getPageById'){getPageById($id);}
else if($act=='editPage'){editPage($id);}
else if($act=='delPage'){
    confirmMes("你确定要删除这个用户吗", "doAdmin.php?act=delPageById&id=$id", "pageList.php");}
else if($act=='delPageById'){
    delPageById($id);
}
else if($act=='getCateList'){
    getCateList();
}
else if($act=='addCate'){addCate();}
else if($act=='getCateById'){getCateById($id);}
else if($act=='editCate'){editCate($id);}
else if($act=='delCate'){
    confirmMes("你确定要删除这个分类吗","doAdmin.php?act=delCateById&id=$id","cateList.php");
}
else if($act=='delCateById'){delCateById($id);}
