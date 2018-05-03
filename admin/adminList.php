<?php include 'header.php';?>
<?php include 'checkIsAdmin.php' ?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">后台角色管理</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作
                <a class="btn btn-default" href="addAdmin.php" role="button">添加管理员</a>
            </p>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>用户名</th>
                        <th>管理员级别</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody id="vue_det">
                <tr v-for="(item,key) in data">
                    <th scope="row">{{key+1}}</th>
                    <td>{{item.username}}</td>
                    <td>{{item.isadmin}}</td>
                    <td>
                        <a class="btn btn-default" :href="'editAdmin.php?id=' + item.id" role="button">编辑</a>
                        <a class="btn btn-default" :href="'doAdmin.php?act=delAdmin&id=' + item.id" role="button">删除</a>
                    </td>
                </tr>
                <tr v-show="isData===0">
                    <td colspan="3" >暂无查询记录</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var a = $(".nav-sidebar").find("li").eq(7);
        a.addClass("active");
        a.parent().parent().find(".glyphicon-menu-down").toggleClass("glyphicon-menu-up");
        a.parent().parent().find(".nav").toggleClass("noblock");
        (function() {
            $.get("doAdmin.php?act=getAdminList",
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