<?php
/**
 * Created by PhpStorm.
 * User: junbaor
 * Date: 2016/3/17
 * Time: 15:15
 */

require_once('connect.php');
require_once 'Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;

try {
    $param = $_GET['imgname'];
    $accessKey = 'r9dFthv4VrQcfgOWxueyUCIClSYj77GJ_inWLiTI';
    $secretKey = 'YPSPO1b8DkR3SzNvgrTBhmmst1pvNNwkylyLCyOR';
    $auth = new Auth($accessKey, $secretKey);
    $bucketMgr = new BucketManager($auth);
    $bucket = 'junbaor';
    $key = $param;
    $err = $bucketMgr->delete($bucket, $key);
    if ($err !== null) {
        echo '0';
    } else {
        $stmt = $con->prepare("DELETE FROM oauth_img where imgname=?");
        $stmt->bind_param("s", $imgname);
        $imgname = $param;
        $stmt->execute();
        $stmt->close();
        $con->close();
        echo "1";
    }
} catch (Exception $e) {
    echo '0';
}