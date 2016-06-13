<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午5:05
 */
define("SCRIPT","group_active");
require_once("include/common.php");
_isset_cookie();

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>我的团队</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>

   <?php
   $_result = _query("SELECT * FROM groupd");
   while ($_rows = _fetch_list($_result)) {
      $_array = explode("/",$_rows["member"]);
//      print_r($_array);
      if (in_array($_COOKIE["username"], $_array)) {
         ?>
         <p>
            <a href="reveal_member.php?id=<?php echo $_rows["id"]; ?>">
               <?php echo $_rows["named"]; ?>
            </a>
         </p>
      <?php } ?>
   <?php } ?>
   <p><a href="new_group.php" id="new_group_btn">创建活动团队</a></p>
</div>
</body>
</html>