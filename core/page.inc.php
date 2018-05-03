<?php
function getPageList($pageNow){
    $pageService = new PageService();
    $pageCount=$pageService->getPageCount();
    if($pageNow>=$pageCount){
        $pageNow=$pageCount;
    }
    $fenyePage=$pageService->getPageFenyePage($pageNow);
    $arr=$fenyePage->res_array;
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}
function getPageFenye(){
    if(!empty($_GET['pageNow'])){
        $pageNow=$_GET['pageNow'];
        $pageNow=intval($pageNow);
    }else{
        $pageNow=1;
    }
    $pageService = new PageService();
    $pageCount=$pageService->getPageCount();
    if($pageNow>=$pageCount){
        $pageNow=$pageCount;
    }
    $fenyePage=$pageService->getPageFenyePage($pageNow);
    $arr=$fenyePage->navigate;
    echo $arr;
}
function addPage(){
    if(!empty($_POST['userId'])){
        $userId=$_POST['userId'];
    }else{
        $userId=0;
    }
    $author=$_POST['author'];
    if(empty($_POST['pageName'])){
        alertMes("请填写文章名称","addPage.php");
    }
    $pageName=$_POST['pageName'];
    if(empty($_POST['pageDesc'])){
        alertMes("请填写文章内容","addPage.php");
    }
    $pageDesc=$_POST['pageDesc'];
    $pageUpTime=date("Y-m-d H:i:s");
    $isShow=$_POST['isShow'];
    $isHot=$_POST['isHot'];
    $cateId=$_POST['cateId'];
    $intro=$_POST['intro'];
    if(empty($_POST['sort'])){
        $sort=0;
    }else{
        $sort=$_POST['sort'];
    }
    $pageView=0;
    if($_FILES['myfile']['size']){
        $image=upload($_FILES);
        if($image==3){
            alertMes("图片上传失败","addPage.php");
        }else if($image==1){
            alertMes("文件过大，不能上传大于2m文件","addPage.php");
        }else if($image==2){
            alertMes("文件类型只能是jpg的","addPage.php");
        }
    }
    else{
        $image="";
    }
    $pageService = new PageService();
    $arr=$pageService->addPage($userId,$author,$pageName,$pageView,$pageDesc,$pageUpTime,$isShow,$isHot,$cateId,$intro,$image,$sort);
    if($arr==1){
        alertMes("添加文章成功","pageList.php");
    }else{
        alertMes("添加文章失败，请重新添加","addPage.php");
    }
}
function editPage($id){
    if(!empty($_POST['userId'])){
        $userId=$_POST['userId'];
    }else{
        $userId=0;
    }
    if(empty($_POST['pageName'])){
        alertMes("请填写文章名称","editPage.php?id=$id");
    }
    if(empty($_POST['pageDesc'])){
        alertMes("请填写文章内容","editPage.php?id=$id");
    }
    $author=$_POST['author'];
    $pageName=$_POST['pageName'];
    $pageDesc=$_POST['pageDesc'];
    $pageUpTime=date("Y-m-d H:i:s");
    $isShow=$_POST['isShow'];
    $isHot=$_POST['isHot'];
    $cateId=$_POST['cateId'];
    $intro=$_POST['intro'];
    if(empty($_POST['sort'])){
        $sort=0;
    }else{
        $sort=$_POST['sort'];
    }
    if($_FILES['myfile']['size']){
        $image=upload($_FILES);
        if($image==3){
            alertMes("图片上传失败","editPage.php?id=$id");
        }else if($image==1){
            alertMes("文件过大，不能上传大于2m文件","editPage.php?id=$id");
        }else if($image==2){
            alertMes("文件类型只能是jpg的","editPage.php?id=$id");
        }
    }
    else{
        $image="";
    }
    $pageView=0;
    $pageService = new PageService();
    $arr=$pageService->updatePage($userId,$author,$pageName,$pageView,$pageDesc,$pageUpTime,$isShow,$isHot,$cateId,$intro,$image,$sort,$id);
    if($arr==1){
        alertMes("修改文章成功","pageList.php");
    }else{
        alertMes("修改文章失败，请重新编辑","editPage.php?id=$id");
    }
}
function delPageById($id){
    $pageService = new PageService();
    $arr=$pageService->delPageById($id);
    if($arr==1){
        alertMes("删除文章成功","pageList.php");
    }else{
        alertMes("删除文章失败，请重新操作","pageList.php");
    }
}
function getPageById($id){
    $pageService = new PageService();
    $arr=$pageService->getPageById($id);
    header("content-type:text/json");
    echo json_encode($arr);
    exit();
}