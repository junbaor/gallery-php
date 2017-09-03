<?php
require_once('connect.php');
$sql = "select * from oauth_img order by create_date DESC ";
$query = mysqli_query($con, $sql);
if ($query && mysqli_num_rows($query)) {
    //mysqli_fetch_row 按索引取值
    //mysqli_fetch_assoc 按字段取值
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
}
?>
    <html>
    <head>
        <title>我的图片</title>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
        <link href="static/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" href="#" style="">Figure bed </span>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://yun.junbaor.com/tu">首页</a></li>
                    <li><a href="http://blog.junbaor.com" target="_blank">博客</a></li>
                    <li><a href="#">捐赠</a></li>
                    <li><a href="#">关于</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">注销</a></li>
                    <!--<c:choose>
                        <c:when test="${LOGIN_USER == null}">
                            <li><a href="static/login">QQ 登录</a></li>
                        </c:when>
                        <c:otherwise>
                            <li><a href="static/me">${LOGIN_USER.name}</a></li>
                            <li><a href="static/logout">注销</a></li>
                        </c:otherwise>
                    </c:choose>-->
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="container" style="margin-top: 40px;">
        <table class="table table-hover">
            <caption></caption>
            <thead>
            <tr>
                <th class="text-center">URL</th>
                <th class="text-center">上传时间</th>
                <th colspan="2" class="text-center">操作</th>
            </tr>
            </thead>
            <tbody style="font-size: 14px">
            <?php
            if (empty($data)) {
                echo "";
            } else {
                foreach ($data as $value) {
                    $url = 'http://img.junbaor.com/' . $value['imgname'];
                    ?>
                    <tr align="center">
                        <td><?php echo $url ?></td>
                        <td><?php echo $value['create_date'] ?></td>
                        <td>
                            <a href="javascript:void(0);"
                               onclick="del('<?php echo $value['imgname'] ?>',$(this))">删除</a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onmouseout="$('#preview').hide();"
                               onmouseover="pre('<?php echo $url ?>',$(this));">预览</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <!--<c:forEach var="item" items="${list}">
                <tr align="center">
                    <td>${item.imgname}</td>
                    <td>${item.url}</td>
                    <td>
                        <a href="javascript:void(0);" onclick="del('',$(this))">删除</a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" onmouseout="$('#preview').hide();" onmouseover="pre('',$(this));">预览</a>
                    </td>
                </tr>
            </c:forEach>-->
            </tbody>
        </table>
    </div>
    <div id="preview" style="display: none">
        <img id="preImg" src=""/>
    </div>
    <script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
    <script src="static/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="static/layer/layer.js"></script>
    <script>
        function pre(url, ele) {
            $("#preImg").prop('src', url);
            var y = $(ele).offset().top;
            var top = $(window).scrollTop();
            $("#preview").css({
                position: "absolute",
                'top': top + 50,
                'left': 0,
                'z-index': 2
            });
            $("#preview").show();
        }
        function del(imgname, ele) {
            layer.confirm('真的要删除吗？', {
                btn: ['删除', '算了'] //按钮
            }, function () {
                $.ajax({
                    url: 'delete.php',
                    type: 'get',
                    data: {'imgname': imgname},
                    success: function (data) {
                        if (data > 0) {
                            layer.msg('删除成功', {icon: 1});
                            ele.parent().parent().fadeOut("slow");
                        } else {
                            layer.msg('删除失败');
                        }
                    },
                    error: function () {
                        layer.msg('删除异常');
                    }
                });
            }, function () {

            });
        }
    </script>
    </body>
    </html>
<?php
$con->close();
?>