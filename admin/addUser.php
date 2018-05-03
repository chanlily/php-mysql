<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">用户添加</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" action="doAdmin.php?act=addUser" method="post">
            <div class="form-group">
                <label for="username" class="col-xs-3 col-sm-2 control-label text-right">用户名</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-xs-3 col-sm-2 control-label text-right">邮箱</label>
                <div class="col-xs-8">
                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱地址">
                </div>
            </div>
            <div class="form-group">
                <label for="sex" class="col-xs-3 col-sm-2 control-label text-right">性别</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="1"> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="0"> 女
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="2" checked="checked">保密
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-xs-3 col-sm-2 control-label text-right">密码</label>
                <div class="col-xs-8">
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
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
        var a = $(".nav-sidebar").find("li").eq(6);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
    </script>
<?php include 'footer.php';?>