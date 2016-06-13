<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-19
 * Time: 下午10:15
 */

define("SCRIPT","share_active");
require_once("include/common.php");
_isset_cookie();

$_id = $_GET["id"];
$_html = _affect_array("SELECT * FROM actiion WHERE id=$_id");
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
   <title><?php echo $_html["named"] ?>  回忆分享</title>
</head>
<body>
<img src="img/logo/share.png" style="display:none">
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <!--先显示图片-->
   <?php
   $_result_member = _query("SELECT * FROM joind WHERE active_id=$_id AND reg=1");
   ?>
   <div id="detail">
<!--      活动封面:-->
      <img src="<?php echo $_html["photo"] ?>">
<!--      <br>活动详情<br>-->
      <p class="topic">
         <?php echo $_html["named"] ?>
      </p>
      <p class="date">
         <?php echo $_html["dates"].$_html["times"].' 一一 '.$_html["datee"] ?>
      </p>
      <p><em class="title_em">Place</em><?php echo $_html["placed"] ?></p>
      <p><em class="title_em">Descr</em><?php echo $_html["descr"] ?></p>
      <p><em class="title_em">result</em><?php echo $_html["result"] ?></p>
      <em class="team_header">活动队员</em>

      <div id="team_member">
         <?php
         while($_member = _fetch_list($_result_member)){
            echo $_member["join_name"]." ";
         }
         ?>
      </div>
   </div>
   <div id="v_p">
      <?php
      /*图片*/
      $_result_p = _query("SELECT * FROM pic WHERE active_id=$_id");
      while ($_rows_p = _fetch_list($_result_p)) {
         ?>
          <div class="v_p_c">
             <p><?php echo $_rows_p["descr"] ?></p>
             <img src="<?php echo $_rows_p["img"] ?>">
          </div>
      <?php } ?>
<!--      --><?php
//      /*视频*/
//      $_result_v = _query("SELECT * FROM pic WHERE active_id=$_id");
//      while ($_rows_v = _fetch_list($_result_v)) { ?>
<!--         <img src="--><?php //echo $_rows_v["img"] ?><!--">-->
<!--      --><?php //} ?>
   </div>
</div>
</body>
</html>