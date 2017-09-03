<?php
/**
 * Created by PhpStorm.
 * User: junbaor
 * Date: 2016/3/17
 * Time: 14:00
 */
require_once('connect.php');
$insertsql = "insert into oauth_img(uid, imgname) values('00001', '213132')";
mysqli_query($con, $insertsql);