<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">用户添加</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" action="doAdmin.php?act=addAdmin" method="post">
            <div class="form-group">
                <label for="username" class="col-xs-3 col-sm-2 control-label text-right">用户名</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-xs-3 col-sm-2 control-label text-right">密码</label>
                <div class="col-xs-8">
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                </div>
            </div>
            <div class="form-group">
                <label for="isAdmin" class="col-xs-3 col-sm-2 control-label text-right">管理员级别</label>
                <div class="col-xs-8">
                    <input type="text" name="isAdmin" class="form-control" placeholder="请输入管理员级别，默认0">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 col-sm-offset-2 col-xs-8">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var a = $(".nav-sidebar").find("li").eq(7);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
    </script>
<?php include 'footer.php';?>