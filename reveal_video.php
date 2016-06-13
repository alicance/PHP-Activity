<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-20
 * Time: 下午6:58
 */
define("SCRIPT","reveal_video");
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
   <title>视频墙</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ;
   $_active = _affect_array("SELECT * FROM actiion WHERE id=$_id LIMIT 1");
   ?>
   <p><?php echo '<font color="#6495ed">'.$_active["named"].'</font>'."活动视频墙" ?></p>
   <?php
   $_result = _query("SELECT * FROM video WHERE active_id=$_id");
   while($_rows = _fetch_list($_result)){
   ?>
   <div class="reveal">
      <p class="title">
         <em class="left"><?php echo $_rows["handler"] ?></em>
         <em class="right"><?php echo $_rows["dated"] ?></em>
      </p>
      <p>
         <video loop="loop" width="100%" controls="controls">
            <source src="<?php echo $_rows["video"] ?>">
         </video>
      </p>
      <p><?php echo $_rows["descr"] ?></p>
   </div>
   <?php } ?>

   <div id="recommend">
      <!--显示评论-->
      <?php
      $_rec_result = _query("SELECT * FROM recom WHERE active_id=$_id AND typed=2");
      while($_rec_rows = _fetch_list($_rec_result)){
         ?>
         <p class="re_reveal">
            <font color="#0095FF"><?php echo $_rec_rows["handler"] ?></font>
            _say_:
            <?php echo $_rec_rows["content"] ?>
         </p>
      <?php } ?>
      <input type="hidden" value="<?php echo $_id ?>" class="hidden">
      <?php
      if(isset($_COOKIE["username"])){?>
         <p>
            <input type="text" class="txt" placeholder="我也来说一句...">
            <img src="img/logo/recommemed.png" class="re_img">
         </p>
      <?php }else{echo '<font color="#8a2be2">请先登录再参与评论...</font>'; } ?>
      <?php
      $_actiion = _affect_array("SELECT * FROM actiion WHERE id=$_id");
      $_group = _affect_array("SELECT * FROM groupd WHERE id={$_actiion["ground"]}");
      $_member_array = explode("/",$_group["member"]);
      if(in_array($_COOKIE["username"],$_member_array)){
         ?>
         <p>
            <a href="up_video.php?id=<?php echo $_id ?>" id="share_btn">
               分享活动视频
            </a>
         </p>
      <?php } ?>
   </div>
</div>
</body>
</html>