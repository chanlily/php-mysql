<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">欢迎登录</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作</p>
        </div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>文章管理</th>
                <td><a href="pageList.php">查看</a></td>
            </tr>
            <tr>
                <th>用户管理</th>
                <td><a href="adminList.php">查看</a></td>
            </tr>
            <tr>
                <th>分类管理</th>
                <td><a href="cateList.php">查看</a></td>
            </tr>
            <tr>
                <th>配置信息</th>
                <td><a href="setting.php">查看</a></td>
            </tr>
            <tr>
                <th>系统名称</th>
                <td>后台管理系统</td>
            </tr>
            <tr>
                <th>开发人员</th>
                <td>@chanLily</td>
            </tr>
            <tr>
                <th>github博客</th>
                <td><a href="https://chanLily.github.io">https://chanLily.github.io</a></td>
            </tr>
        </table>
    </div>
<script>
    $(".nav-sidebar").find("li").eq(1).addClass("active");
</script>
<?php include 'footer.php';?>