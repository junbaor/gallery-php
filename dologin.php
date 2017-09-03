<?php
/**
 * Created by PhpStorm.
 * User: junbaor
 * Date: 2016/3/17
 * Time: 16:05
 */
session_start();
$name = $_POST['name'];
$pass = $_POST['password'];
if ($name == 'admin' && $pass == 'jiubugaosuni') {
    $_SESSION['LOGIN_OPENID'] = '111111';
    $_SESSION['LOGIN_NAME'] = 'key';
    $_SESSION['error'] = null;
    echo "<script language=\"javascript\">";
    echo "document.location=\"http://yun.junbaor.com/tu\"";
    echo "</script>";
} else {
    $_SESSION['error'] = '用户名或密码不正确,请重试...';
    echo "<script language=\"javascript\">";
    echo "document.location=\"login.php\"";
    echo "</script>";
}