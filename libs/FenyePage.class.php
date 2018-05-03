<?php
/**
 * Created by PhpStorm.
 * User: chanLily
 * Date: 2018-4-26
 * Time: 11:30
 */
//这是一个用于保存分页信息的类
class FenyePage{
    public $pageSize=10;
    public $res_array;//这是显示分页的数据
    public $rowCount;//这是从数据库中获取
    public $pageNow;//这是用户制定的
    public $pageCount;//这个是计算得到的
    public $navigate;//分页导航
    public $gotoUrl;//表示分页请求提交给哪个页面
}