<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">文章添加</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" enctype="multipart/form-data" action="doAdmin.php?act=addPage" method="post">
            <div class="form-group">
                <label for="pageName" class="col-xs-3 col-sm-2 control-label text-right">文章名称</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="pageName" placeholder="请输入文章名称">
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-xs-3 col-sm-2 control-label text-right">作者</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="author" placeholder="请输入作者名称">
                </div>
            </div>
            <div class="form-group">
                <label for="cate" class="col-xs-3 col-sm-2 control-label text-right">分类</label>
                <div class="col-xs-8">
                    <label for="cateId">
                        <select id="app" class="form-control" name="cateId">
                            <option value="0">请选择分类</option>
                            <option v-for="(item,key) in data" :value="item.id">{{item.cName}}
                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="intro" class="col-xs-3 col-sm-2 control-label text-right">介绍</label>
                <div class="col-xs-8">
                    <textarea class="form-control" rows="3" name="intro">
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="intro" class="col-xs-3 col-sm-2 control-label text-right">内容</label>
                <div class="col-xs-8">
                    <textarea id="content" name="pageDesc" class="ckeditor" placeholder="请输入内容"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="myfile" class="col-xs-3 col-sm-2 control-label text-right">封面图片</label>
                <div class="col-xs-8">
                    <input type="file" class="form-control" name="myfile">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-xs-3 col-sm-2 control-label text-right">排序</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="sort" placeholder="请输入排序，默认为0">
                </div>
            </div>
            <div class="form-group">
                <label for="isShow" class="col-xs-3 col-sm-2 control-label text-right">是否显示</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="isShow" value="1" checked="checked">显示
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isShow" value="0">隐藏
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="isHot" class="col-xs-3 col-sm-2 control-label text-right">热门显示</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="isHot" value="1">是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isHot" value="0" checked="checked">否
                    </label>
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
        var a = $(".nav-sidebar").find("li").eq(3);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
        (function() {
            $.get("doAdmin.php?act=getCateList",
                function(result, state) {
                    new Vue({
                        el:'#app',
                        data:{//data就是数据，主要绑定的数据
                            data:result
                        }
                    });
                })
        })();
    </script>
    <script src="https://cdn.bootcss.com/ckeditor/4.8.0/ckeditor.js"></script>
<?php include 'footer.php';?>