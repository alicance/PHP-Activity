<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-21
 * Time: 下午12:26
 */
define("SCRIPT","find_active");
require_once("include/common.php");
_isset_cookie();
$_id = $_GET["id"];
$_con = $_GET["con"];
$_type = $_GET["type"];
$_date = date("n月d日 H:i:s");
$_ip = $_SERVER["SERVER_ADDR"];
_query("INSERT INTO recom (active_id,content,typed,handler,dated,ip)
                   VALUES (
                           '$_id',
                           '$_con',
                            $_type,
                           '{$_COOKIE["username"]}',
                           '$_date',
                           '$_ip'
                        )");