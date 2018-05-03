<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">用户管理</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作
                <a class="btn btn-default" href="addUser.php" role="button">添加用户</a></p>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>用户名</th>
                    <th>性别</th>
                    <th>电子邮箱</th>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody  id="vue_det">
                <tr v-for="(item,key) in data">
                    <th scope="row">{{key+1}}</th>
                    <td>{{item.username}}</td>
                    <td>{{item.sex}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.regTime}}</td>
                    <td>
                        <a class="btn btn-default" :href="'editUser.php?id=' + item.id" role="button">编辑</a>
                        <a class="btn btn-default" :href="'doAdmin.php?act=delUser&id=' + item.id" role="button">删除</a>
                    </td>
                </tr>
                <tr v-show="isData===0">
                    <td colspan="5" >暂无查询记录</td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php getUserFenye();?>
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
            $.get("doAdmin.php?act=getUserList&"+id,
                function(result, state) {
                    for(var i=0;i<result.length;i++){
                        var a=result[i]['sex'];
                        if(a==0){
                            result[i]['sex']='女';
                        }else if(a==1){
                            result[i]['sex']='男';
                        }else{
                            result[i]['sex']='保密';
                            console.log(result[i]['sex']);
                        }
                    }
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