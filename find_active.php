<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午3:56
 */
define("SCRIPT","find_active");
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
   $_result = _query("SELECT * FROM actiion ORDER BY id DESC LIMIT 20");
   while($_rows = _fetch_list($_result)){
      $_result_num = _query("SELECT * FROM joind WHERE active_id={$_rows["id"]}");
      $_num = _num_rows($_result_num);
   ?>
   <div class="result">
      <p><?php echo $_rows["named"] ?></p>
      <img src="<?php echo $_rows["photo"] ?>">
      <p class="time"><!--活动时间处于-->Time:
         <?php echo $_rows["dates"].' '.$_rows["times"].'--'.$_rows["datee"] ?>
      </p>
      <p class="hr1">已有<font color="blue"> <?php echo $_num ?> </font>人报名</p>
      <p>创建于<?php echo $_rows["handler_time"] ?></p>
      <p><?php echo $_rows["placed"] ?></p>
      <p><?php echo $_rows["handler"] ?></p>
      <p  class="hr2"><?php echo $_rows["descr"] ?></p>
      <p>
         <a href="reveal_photo.php?id=<?php echo $_rows["id"] ?>" class="photo_q">
            照片墙
         </a><a href="reveal_video.php?id=<?php echo $_rows["id"] ?>" class="video_q">
            视频墙
         </a>
      </p>
      <?php
      $_j_result = _query("SELECT * FROM joind WHERE active_id={$_rows["id"]} AND join_name='{$_COOKIE["username"]}'");
      if(_num_rows($_j_result) ==0){
      ?>
      <a href="" class="join" title="<?php echo $_rows["id"] ?>">
         加入次活动
      </a>
      <?php }else{ ?>
          <button class="h_btn">已加入活动</button>
      <?php  }?>
   </div>
   <?php } ?>
</div>
</body>
</html>