<?php include'doAdmin.php'?>
<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>后台管理首页</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row mt-50">
        <div class="visible-xs-block col-xs-12">
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="pageList.php">文章管理</a></li>
                    <li><a href="userList.php">用户管理</a></li>
                    <li><a href="addPage.php">文章发布</a></li>
                    <li><a href="cateList.php">分类管理</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li>
                    <a href="index.php"><h3>ChanLily</h3></a>
                </li>
                <li>
                    <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;首页</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;文章管理<span class="glyphicon glyphicon-menu-down f_r glyphicon-menu-up"></span></a>
                    <ul class="nav userlist noblock">
                        <li><a href="addPage.php">添加文章</a></li>
                        <li><a href="pageList.php">文章列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;用户管理
                        <span class="glyphicon glyphicon-menu-down f_r glyphicon-menu-up"></span></a>
                    <ul class="nav userlist noblock">
                        <li><a href="userList.php">用户管理</a></li>
                        <li><a href="adminList.php">后台角色管理</a></li>
                    </ul>
                </li>
<!--                <li>-->
<!--                    <a href="addPage.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;文章发布</a>-->
<!--                </li>-->
                <li>
                    <a href="cateList.php"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;&nbsp;分类管理</a>
                </li>
                <li>
                    <a href="setting.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;配置信息</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <nav class="navbar col-sm-offset-3 col-md-offset-2 navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#" onClick="javascript :history.back(-1);"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>返回</a></li>
                        <li><a href="index.php" title="首页"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;网站首页</a></li>
                    </ul>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" title="admin"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $name ?></a></li>
                        <li><a href="doAdmin.php?act=logout">退出</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="searchform" method="post" action="doAdmin.php?act=search">
                        <input type="text" class="form-control" id="search" name="search" placeholder="搜索">
                        <span class="glyphicon glyphicon-search"></span>
                        <button  class="glyphicon glyphicon-search" type="submit" aria-hidden="true"></button>
                    </form>
                </div>
            </nav>