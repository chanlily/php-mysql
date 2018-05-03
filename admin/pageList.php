<?php include 'header.php';?>
    <div class="panel panel-default mt-20">
        <div class="panel-heading">文章列表管理</div>
        <div class="panel-body">
            <p>使用php开发，mysql数据库操作
                <a class="btn btn-default" href="addPage.php" role="button">添加文章</a></p>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>文章名称</th>
                    <th>作者</th>
                    <th>分类</th>
                    <th>简介</th>
                    <th>浏览次数</th>
                    <th>更新时间</th>
                    <th>图片</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody  id="vue_det">
                <tr v-for="(item,key) in data">
                    <th scope="row">{{key+1}}</th>
                    <td>{{item.pageName}}</td>
                    <td>{{item.author}}</td>
                    <td>{{item.cName}}</td>
                    <td>{{item.intro}}</td>
                    <td>{{item.pageView}}</td>
                    <td>{{item.pageUpTime}}</td>
                    <td><img :src="'../upload/'+item.image" style="height:50px;"></td>
                    <td>
                        <a class="btn btn-default" :href="'editPage.php?id=' + item.id" role="button">编辑</a>
                        <a class="btn btn-default" :href="'doAdmin.php?act=delPage&id=' + item.id" role="button">删除</a>
                    </td>
                </tr>
                <tr v-show="isData===0">
                    <td colspan="8" >暂无查询记录</td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php getPageFenye();?>
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
            $.get("doAdmin.php?act=getPageList&"+id,
                function(result, state) {
                    for(var i=0;i<result.length;i++){
                        var a=result[i]['sex'];
                        if(a==0){
                            result[i]['sex']='女';
                        }else if(a==1){
                            result[i]['sex']='男';
                        }else{
                            result[i]['sex']='保密';
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