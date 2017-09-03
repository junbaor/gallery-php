<?php
/**
 * Created by PhpStorm.
 * User: JUNBAOR-PC$
 * Date: 2016/3/16
 * Time: 15:14
 */
require_once('connect.php');
require_once('Qiniu/autoload.php');
require_once('util.php');
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
$accessKey = 'r9dFthv4VrQcfgOWxueyUCIClSYj77GJ_inWLiFF';
$secretKey = 'YPSPO1b8DkR3SzNvgrTBhmmst1pvNNwkylyLCyFF';
$auth = new Auth($accessKey, $secretKey);
$bucket = 'junbaor';
$token = $auth->uploadToken($bucket);
$uploadMgr = new UploadManager();
if (empty($_FILES)) {
    echo "";
} else {
    $size = $_FILES["file"]["size"];
    $name = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $key = uuid() . getFileExtension($name);
    $PSize = filesize($tempname);
    $picturedata = fread(fopen($tempname, "r"), $PSize);
    list($ret, $err) = $uploadMgr->put($token, $key, $picturedata);
    if ($err !== null) {
        echo "{\"code\":\"error\",\"src\":\"http://img.junbaor.com/" . $key . "\"", ",\"size\":" . $size . "message:" . $err . " }";
    } else {
        $insertsql = "insert into oauth_img(uid, imgname) values(666666, '$key')";
        mysqli_query($con, $insertsql);
        $con->close();
        echo "{\"code\":\"success\",\"src\":\"http://img.junbaor.com/" . $key . "\"", ",\"size\":" . $size . " }";
    }
}
