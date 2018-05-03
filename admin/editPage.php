<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">文章添加</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" enctype="multipart/form-data" action="doAdmin.php?act=editPage&id=<?php echo $_GET['id'];?>" method="post" id="app">
            <div class="form-group">
                <label for="pageName" class="col-xs-3 col-sm-2 control-label text-right">文章名称</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="pageName" placeholder="请输入文章名称">
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-xs-3 col-sm-2 control-label text-right">作者</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="author" placeholder="请输入作者名称" :value="data.author">
                </div>
            </div>
            <div class="form-group">
                <label for="cate" class="col-xs-3 col-sm-2 control-label text-right">分类</label>
                <div class="col-xs-8">
                    <select class="form-control" name="cateId" id="vue_det">
                        <option value ="0">请选择分类</option>                         <option v-for="(item,key) in data" :value="item.id">{{item.cName}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="intro" class="col-xs-3 col-sm-2 control-label text-right">介绍</label>
                <div class="col-xs-8">
                    <textarea class="form-control" rows="3" name="intro"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="pageDesc" class="col-xs-3 col-sm-2 control-label text-right">内容</label>
                <div class="col-xs-8">
                    <textarea rows="8" name="pageDesc" class="form-control ckeditor"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="myfile" class="col-xs-3 col-sm-2 control-label text-right">封面图片</label>
                <div class="col-xs-8">
                    <input type="file" class="form-control image" name="myfile">
                    <div id="image"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="isShow" class="col-xs-3 col-sm-2 control-label text-right">是否显示</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="isShow" value="1" :checked="[data.isShow===1 ? checked : '']">显示
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isShow" value="0" :checked="[data.isShow===0 ? checked : '']">隐藏
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="isHot" class="col-xs-3 col-sm-2 control-label text-right">热门显示</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="isHot" value="1" :checked="[data.isHot===1 ? checked : '']">是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isHot" value="0" :checked="[data.isHot===0 ? checked : '']">否
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 col-sm-offset-2 col-xs-8">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
        <div class="haha"></div>
    </div>
    <script>
        var a = $(".nav-sidebar").find("li").eq(4);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
        (function() {
            var query = window.location.search.substring(1);
            var vars = query.split("?");
            var id = vars[0];
            var a=0;
            $.get("doAdmin.php?act=getCateList",
                function(result, state) {
                    new Vue({
                        el:'#vue_det',
                        data:{//data就是数据，主要绑定的数据
                            data:result,
                            isData:result.length
                        }
                    });
                });
            $.get("doAdmin.php?act=getPageById&"+id,
                function(result, state) {
//                    new Vue({
//                        el:'#app',
//                        data:{//data就是数据，主要绑定的数据
//                            data:result
//                        }
//                    })
                    $("input[name='isShow']").attr('checked',result['isShow']);
                    $("input[name='isHot']").attr('checked',result['isHot']);
                    $("input[name='author']").val(result['author']);
                    $("input[name='pageName']").val(result['pageName']);
                    $("input[name='pageView']").val(result['pageView']);
                    $("textarea[name='intro']").val(result['intro']);
                    $("textarea[name='pageDesc']").val(result['pageDesc']);
                    $("select[name='cateId']").find("option[value = '"+result['cateId']+"']").attr("selected","selected");
                });
        })();
</script>
    <script src="https://cdn.bootcss.com/ckeditor/4.8.0/ckeditor.js"></script>
<?php include 'footer.php';?>