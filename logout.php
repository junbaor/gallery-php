<?php
/**
 * Created by PhpStorm.
 * User: junbaor
 * Date: 2016/3/17
 * Time: 15:48
 */
session_start();
session_destroy();
echo "<script language=\"javascript\">";
echo "document.location=\"http://yun.junbaor.com/tu\"";
echo "</script>";
?>
