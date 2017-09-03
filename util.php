<?php
/**
 * Created by PhpStorm.
 * User: junbaor
 * Date: 2016/3/17
 * Time: 11:30
 */
function uuid($prefix = "")
{
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 8);
    $uuid .= substr($str, 8, 4);
    $uuid .= substr($str, 12, 4);
    $uuid .= substr($str, 16, 4);
    $uuid .= substr($str, 20, 12);
    return date("Ymd", time()) . strtoupper($prefix . $uuid);
}

function getFileExtension($filename)
{
    $index = strripos($filename, ".");
    return substr($filename, $index);
}