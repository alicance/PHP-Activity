<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-20
 * Time: 下午2:25
 */
define("SCRIPT","reveal_member");
require_once("include/common.php");
_isset_cookie();

if(isset($_GET["id"])){
   $_id = $_GET["id"];
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>团队成员</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <?php
   $_row = _affect_array("SELECT * FROM groupd WHERE id=$_id");
   $_rows = explode("/",$_row["member"]);
   $_rows_length = count($_rows);
   foreach(range(0,$_rows_length-1) as $_i){
      echo "<p>$_rows[$_i]</p>";
   }?>
   <p>一共有<font color="#8a2be2"><?php echo $_rows_length ?></font>个队员</p>
   <p>
      <a id="modify_btn" href="modify_group.php?id=<?php echo $_id ?>">
         修改团队信息
      </a>
   </p>
</div>
</body>
</html>