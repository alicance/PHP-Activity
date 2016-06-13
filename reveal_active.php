<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午3:56
 */
define("SCRIPT","reveal_active");
require_once("include/common.php");
_isset_cookie();

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>我的活动</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <?php
      $_result = _query("SELECT * FROM actiion ORDER BY id DESC");
      while($_rows = _fetch_list($_result)){
         $_html = _affect_array("SELECT * FROM groupd WHERE id={$_rows["ground"]}");
         $_html_array = explode("/",$_html["member"]);
         if(in_array($_COOKIE["username"],$_html_array)){
            $_g_num = _num_rows(_query("SELECT * FROM joind WHERE active_id={$_rows["id"]}"));
            $_r_num = _num_rows(_query("SELECT * FROM joind WHERE active_id={$_rows["id"]} AND reg=1"));

   ?>
       <div class="active">
          <p>
             <em class="left">
                <?php echo $_rows["handler_time"] ?>
<!--                <a href="share_active.php?id=--><?php //echo $_rows["id"] ?><!--"style="color: #EEB4B4">-->
<!--                   share<img src="img/logo/share.png" style="width: 15px;height: 14px">-->
<!--                </a>-->
             </em>
             <?php echo $_rows["named"] ?>
             <em class="right">
                <a href="modify_active.php?id=<?php echo $_rows["id"] ?>" style="color: #B5B5B5">
                   modify
                </a>
             </em>
          </p>
          <a href="share_active.php?id=<?php echo $_rows["id"] ?>" style="color: #EEB4B4">
             <img src="<?php echo $_rows["photo"] ?>" class="img">
          </a>
          <p>
             <em class="t_l">已有<font color="#dc143c">
                   <?php echo $_g_num ?></font>人已报名
                <a href="plus_member_active.php?id=<?php echo $_rows["id"] ?>" class="plus">
                   &nbsp;+&nbsp;
                </a>
             </em>
             <em class="t_r">已有<font color="#dc143c">
                   <?php echo $_r_num ?></font>人已签到
                <a href="register_member_active.php?id=<?php echo $_rows["id"] ?>" class="plus">
                   &nbsp;+&nbsp;
                </a>
             </em>
          </p>
          <p>
             <a href="reveal_photo.php?id=<?php echo $_rows["id"] ?>" class="s_img">
                图 片 墙
             </a>
             <a href="reveal_video.php?id=<?php echo $_rows["id"] ?>" class="s_video">
                视 频 墙
             </a>
          </p>
          <input type="text" class="result"
                 title="<?php echo $_rows["id"] ?>"
                 value="<?php echo $_rows["result"] ?>"
                 placeholder="This is text every+ could changed"
              >
       </div>
   <?php } } ?>
</div>
</body>
</html>