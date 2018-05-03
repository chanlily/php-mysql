<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/libs".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once "configs.inc.php";
require_once "SqlHelper.class.php";
require_once 'FenyePage.class.php';
require_once "AdminService.class.php";
require_once "UserService.class.php";
require_once "PageService.class.php";
require_once "CateService.class.php";
require_once "checkcode.php";
require_once "common.php";
require_once "admin.inc.php";
require_once "user.inc.php";
require_once "page.inc.php";
require_once "cate.inc.php";