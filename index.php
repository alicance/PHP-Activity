<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午12:06
 */
define("SCRIPT","index");
require_once("include/common.php");
if(isset($_GET["sub"])){
   $_name = $_GET["login"];
   _set_cookies($_name);
   header("Location:active.php");
    /*将数据存入数据库*/
}
if(isset($_COOKIE["username"])){
   header("Location:active.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
   <title>正在进入</title>
</head>
<body>
<form>
   <label for="login">
      <input type="text" name="login" id="login" placeholder="请输入您的真实姓名">
   </label>
   <br>
   <input type="submit" name="sub" id="sub" value="进入活动应用">
</form>
</body>
</html>