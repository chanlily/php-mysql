<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">用户编辑</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作&nbsp;&nbsp;</p>
        </div>
        <!-- Table -->
        <form class="form-horizontal" action="doAdmin.php?act=editUser&id=<?php echo $_GET['id'];?>" method="post" id="vue_det">
            <div class="form-group">
                <label for="username" class="col-xs-3 col-sm-2 control-label text-right">用户名</label>
                <div class="col-xs-8">
                    <p class="form-control-static">{{data['username']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-xs-3 col-sm-2 control-label text-right">邮箱</label>
                <div class="col-xs-8">
                    <input type="email" name="email" class="form-control" :value="data.email">
                </div>
            </div>
            <div class="form-group">
                <label for="sex" class="col-xs-3 col-sm-2 control-label text-right">性别</label>
                <div class="col-xs-8">
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="1" :checked="[data.sex===1 ? checked : '']"> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="0" :checked="[data.sex===0 ? checked : '']"> 女
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="2" :checked="[data.sex===2 ? checked : '']">保密
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
        var a = $(".nav-sidebar").find("li").eq(6);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
        (function() {
            var query = window.location.search.substring(1);
            var vars = query.split("?");
            var id = vars[0];
            $.get("doAdmin.php?act=getUserById&"+id,
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