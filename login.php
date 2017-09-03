<?php
session_start();
?>
<html>
<head>
    <title>登录</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <link href="static/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/bootstrap-fileinput-4.3.0/css/fileinput.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" style="margin-top: 200px;width: 600px;">
    <form action="dologin.php" method="post">
        <div class="form-group">
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="bg-warning" style="padding: 15px;">'.$_SESSION['error'].'</p>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="name"></label>
            <input class="form-control" id="name" name="name" placeholder="用户名">
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="口令">
        </div>
        <button type="submit" class="btn btn-primary btn-block">登录</button>
    </form>
</div>
<body>
</html>