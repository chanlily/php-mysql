<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">系统信息</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作</p>
        </div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>操作系统</th>
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <th>Apache版本</th>
                <td><?php echo apache_get_version();?></td>
            </tr>
            <tr>
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <th>运行方式</th>
                <td><?php echo PHP_SAPI;?></td>
            </tr>
            <tr>
                <th>系统名称</th>
                <td>后台管理系统</td>
            </tr>
            <tr>
                <th>开发人员</th>
                <td>chanLily</td>
            </tr>
            <tr>
                <th>github博客</th>
                <td><a href="https://chanLily.github.io">https://chanLily.github.io</a></td>
            </tr>
        </table>
    </div>
    <script>
        $(".nav-sidebar").find("li").eq(9).addClass("active");
    </script>
<?php include 'footer.php';?>