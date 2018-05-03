<?php include 'header.php';?>
<?php include 'checkIsAdmin.php' ?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">文章分类编辑</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" action="doAdmin.php?act=editCate&id=<?php echo $_GET['id'];?>" method="post" id="vue_det">
            <div class="form-group">
                <label for="cName" class="col-xs-3 col-sm-2 control-label text-right">分类名称</label>
                <div class="col-xs-8">
                    <input type="text" name="cName" class="form-control" :value="data.cName">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-xs-3 col-sm-2 control-label text-right">排序</label>
                <div class="col-xs-8">
                    <input type="text" name="sort" class="form-control" :value="data.sort">
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
        (function() {
            var query = window.location.search.substring(1);
            var vars = query.split("?");
            var id = vars[0];
            $.get("doAdmin.php?act=getCateById&"+id,
                function(result, state) {
                    new Vue({
                        el:'#vue_det',
                        data:{//data就是数据，主要绑定的数据
                            data:result,
                            isData:result.length
                        }
                    });
                })
        })();
    </script>
<?php include 'footer.php';?>