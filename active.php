<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 上午8:35
 */

define("SCRIPT","active");
require_once("include/common.php");
_isset_cookie();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php require_once("include/header_script.php"); ?>
    <title>活动应用</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
<?php require_once("include/hidden.php") ?>
   <a href="reveal_active.php" class="box">
      <img src="img/logo/logo1.png">
   </a>
   <a href="new_active.php" class="box">
      <img src="img/logo/logo2.png">
   </a>
   <a href="group_active.php" class="box">
      <img src="img/logo/logo3.png">
   </a>
   <a href="find_active.php" class="box">
      <img src="img/logo/logo4.png">
   </a>
</div>
</body>
</html>