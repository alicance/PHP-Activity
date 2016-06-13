<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-19
 * Time: 下午10:15
 */

define("SCRIPT","modify_group");
require_once("include/common.php");
_isset_cookie();

$_id = $_GET["id"];


if (isset($_POST["group_btn"])) {
   $_clean = array();
   $_clean["password"] = $_POST["password"];
   $_clean["named"] = $_POST["named"];
   $_clean["member"] = str_replace(" ","",$_POST["member"]);

   if(empty($_clean["password"])){
//      echo "密码为空";
      _query("UPDATE groupd SET named='{$_clean["named"]}',member='{$_clean["member"]}' WHERE id=$_id");

   }else{
//      echo "pass";
      _query("UPDATE groupd SET named='{$_clean["named"]}',member='{$_clean["member"]}',password='{$_clean["password"]}' WHERE id=$_id");
   }


   if (_affected_rows() == 1) {
//      _location("创建成功", "reveal_member.php?id=$_id");
      header("Location:reveal_member.php?id=$_id");
   }
}

//获取信息
$_html = _affect_array("SELECT * FROM groupd WHERE id=$_id");



?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
   <title>修改团队</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <form method="post" action="?id=<?php echo $_id ?>">
      <p>
         <label>
            团队名称:
            <input type="text" name="named" id="named" class="input" value="<?php echo $_html["named"] ?>">
         </label>
      </p>
      <p>
         <label>
            团队密码:
            <input type="text" name="password" id="password" class="input" placeholder="留空则不修改">
         </label>
      </p>
      <p>
         <label>
            <textarea placeholder="请输入成员的名字 以斜杠隔开" name="member"><?php echo $_html["member"] ?>
            </textarea>
         </label>
      </p>
      <p>
         <label>
            <input type="submit" value="修改团队信息" id="group_btn" name="group_btn">
         </label>
      </p>
      <p id="error_pass">密码不得少于五位数</p>
      <p id="error_name">团队名称不得为空或不得大于10位</p>
   </form>
</div>
</body>
</html>