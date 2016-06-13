<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-19
 * Time: 下午10:15
 */
define("SCRIPT","new_group");
require_once("include/common.php");
_isset_cookie();

if(isset($_POST["group_btn"])){
   $_html = array();
   $_html["named"] = $_POST["named"];
   $_html["password"] = md5(uniqid($_POST["password"],false));
   $_html["member"] = str_replace(" ","",$_POST["member"]);
//   print_r($_html);
//   exit;
   _query("INSERT INTO  groupd (named,password,member,handler,dated) VALUES
                                (
                                 '{$_html["named"]}',
                                 '{$_html["password"]}',
                                 '{$_html["member"]}',
                                 '{$_COOKIE["username"]}'
                                 NOW()
                                )");
}
if(_affected_rows() == 1){
   _location("创建成功","manage.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
   <title>创建团队</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <form method="post">
      <p>
         <label>
            团队名称:
            <input type="text" name="named" id="named" class="input">
         </label>
      </p>
      <p>
         <label>
            团队密码:
            <input type="password" name="password" id="password" class="input">
         </label>
      </p>
      <p>
         <label>
            <textarea placeholder="请输入成员的名字 以斜杠 '/' 隔开" name="member"></textarea>
         </label>
      </p>
      <p>
         <label>
            <input type="submit" value="创建团队" id="group_btn" name="group_btn">
         </label>
      </p>
      <p id="error_pass">密码不得少于五位数</p>
      <p id="error_name">团队名称不得为空或不得大于10位</p>
   </form>
</div>
</body>
</html>