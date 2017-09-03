<?php
session_start();
?>

<html>
<head>
    <title>图床</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <link href="static/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <%--
    <link href="static/css/offcanvas.css" rel="stylesheet">
    <link href="static/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    --%>
    <link href="static/bootstrap-fileinput-4.3.0/css/fileinput.min.css" rel="stylesheet">
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
                <li class="active"><a href="#">首页</a></li>
                <li><a href="http://blog.junbaor.com" target="_blank">博客</a></li>
                <li><a href="#">捐赠</a></li>
                <li><a href="#">关于</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['LOGIN_OPENID'])) {
                    echo '<li><a href="me.php">我的图片</a></li>
                                <li><a href="logout.php">注销</a></li>';
                } else {
                    echo '<li><a href="login.php">登录</a></li>';
                }
                ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
<div class="container" style="margin-top: 80px;">

    <p class="bg-info" style="padding: 15px;">测试中...</p>
    <p class="bg-warning" style="padding: 15px;">每次最多上传 5 张图片,每张图片不能超过 5 M.</p>

    <form enctype="multipart/form-data">
        <div class="form-group" style="height: 300px;margin: 10px auto">
            <input id="file" multiple type="file" name="file" class="file"/>
        </div>
    </form>
    <div id="showurl" style="margin-top: 120px;display: none">
        <p>URL:</p>
        <pre><code id="urlcode"></code></pre>
        <p>HTML Code:</p>
        <pre><code id="htmlcode"></code></pre>
        <p>Markdown:</p>
        <pre><code id="markdown"></code></pre>
    </div>
</div>

<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
<script src="static/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="static/bootstrap-fileinput-4.3.0/js/fileinput.min.js"></script>
<script src="static/bootstrap-fileinput-4.3.0/js/fileinput_locale_zh.js"></script>
<script>
    $("#file").fileinput({
        language: 'zh',
        uploadUrl: 'save.php',
        showUpload: true,
        uploadAsync: true,
        allowedFileTypes: ['image'],
        maxFileSize: 5120,
        maxFileCount: 5,
    });
    $('#file').on('fileuploaded', function (event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
        if (response.code == 'success') {
            if ($("showurl").css("display")) {
                $('#urlcode').append(response.src + "\n");
                $('#htmlcode').append("&lt;img src=\"" + response.src + "\" /&gt; \n");
                $('#markdown').append("![图片描述](" + response.src + ")" + "\n");
            } else if (response.src) {
                $("#showurl").show();
                $('#urlcode').append(response.src + "\n");
                $('#htmlcode').append("&lt;img src=\"" + response.src + "\" /&gt; \n");
                $('#markdown').append("![图片描述](" + response.src + ")" + "\n");
            }
        }
    });
</script>
</body>
</html>
