<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">文章分类添加</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" action="doAdmin.php?act=addCate" method="post">
            <div class="form-group">
                <label for="cName" class="col-xs-3 col-sm-2 control-label text-right">分类名</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="cName" placeholder="请输入分类名">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-xs-3 col-sm-2 control-label text-right">排序</label>
                <div class="col-xs-8">
                    <input type="text" name="sort" class="form-control" placeholder="请输入排序，默认0">
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
        var a = $(".nav-sidebar").find("li").eq(8);
        a.addClass("active");
    </script>
<?php include 'footer.php';?>