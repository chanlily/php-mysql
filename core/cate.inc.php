<?php
function getCateList(){
    $cateService = new CateService();
    $isAdmin = checkIsAdmin();
    if($isAdmin >= 1){
        $arr=$cateService->getCateList();
        header("content-type:text/json");
        echo json_encode($arr);
        exit();
    }else{
        return "";
    }
}
function addCate(){
    if(empty($_POST['cName'])){
        alertMes("分类名称不能为空","addCate.php");
    }
    $cName=$_POST['cName'];
    if(empty($_POST['sort'])){
        $sort=0;
    }else{
        $sort=$_POST['sort'];
    }
    $cateService = new CateService();
    $arr=$cateService->addCate($cName,$sort);
    if($arr==1){
        alertMes("添加分类成功","cateList.php");
    }else{
        alertMes("添加分类失败，请重新添加","addCate.php");
    }
}
function getCateById($id){
    $cateService = new CateService();
    $arr=$cateService->getCateById($id);
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function delCateById($id){
    $cateService = new CateService();
    $arr=$cateService->delCateById($id);
    if($arr==1){
        alertMes("删除分类成功","cateList.php");
    }else{
        alertMes("删除分类失败，请重新编辑","cateList.php");
    }
}
function editCate($id){
    if(empty($_POST['cName'])){
        alertMes("分类名称不能为空，请重新编辑","editCate.php?id=$id");
    }
    $cName=$_POST['cName'];
    if(empty($_POST['sort'])){
        $sort=0;
    }else{
        $sort=$_POST['sort'];
    }
    $cateService = new CateService();
    $arr=$cateService->updateCate($cName,$sort,$id);
    if($arr==1){
        alertMes("修改分类成功","cateList.php");
    }else{
        alertMes("修改分类失败，请重新编辑","editCate.php?id=$id");
    }
}