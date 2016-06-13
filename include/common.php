<meta charset="utf-8">
<?php
/**
 * Created by PhpStorm.
 * User: Alic
 * Date: 15-7-4
 * Time: 下午7:50
 */
define("AL_NAME",TRUE);
require_once("mysql_func.php");    //引用数据库函库
require("core.inc.php");    //引用核心函数库

//define("DB_HOST","w.rdc.sae.sina.com.cn");
//define("DB_USER","nlw3lkjnmk");
//define("DB_PASSWORD","fenglican");
//define("DB_NAME","app_alicshare");

  define("DB_HOST","localhost");
  define("DB_USER","root");
  define("DB_PASSWORD","");
  define("DB_NAME","alic");


//define("DB_HOST","mysql.1freehosting.com");
//define("DB_USER","u359949069_alic");
//define("DB_PASSWORD","fenglican1015");
//define("DB_NAME","u359949069_alic");


_connect();
_select_db();
_set_charset();




// 设置时区
date_default_timezone_set('Asia/Shanghai');
