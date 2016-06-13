<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午5:05
 */
define("SCRIPT","detail_active");
require_once("include/common.php");
_isset_cookie();

if(isset($_GET["d_id"])){
   $_d_id = $_GET["d_id"];
   _query("DELETE FROM actiion WHERE id=$_d_id");
   header("Location:reveal_active.php");
}
$_id = null;
if(isset($_GET["id"])){
   $_id = $_GET["id"];
}else{
   _alert("非法操作");
   exit;
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>活动详情</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php $_row = _affect_array("SELECT * FROM actiion WHERE id=$_id") ?>
   <p>活动名称</p>
   <p class="border"><?php echo $_row["named"] ?></p>
   <p> 活动代号</p>
   <p class="border"><?php echo $_row["uniqued"] ?></p>
   <p>活动地点</p>
   <p class="border"><?php echo $_row["placed"] ?></p>
   <p>开始时间</p>
   <p class="border"><?php echo $_row["dates"].' '.$_row["times"] ?></p>
   <p>结束时间</p>
   <p class="border"><?php echo $_row["datee"] ?></p>
   <p>发起时间</p>
   <p class="border"><?php echo $_row["handler_time"] ?></p>
   <p>活动发起人</p>
   <p class="border"><?php echo $_row["handler"] ?></p>
   <p>活动描述</p>
   <p class="border"><?php echo $_row["descr"] ?></p>
   <!--在此显示加入该活动的人员-->
   <p>活动报名人员</p>
   <table>
<!--      <tr>-->
<!--         <th>姓名</th>-->
<!--         <th>是否到场</th>-->
<!--      </tr>-->
      <?php
//      $_id = _fetch_list("SELECT * FROM actiion WHERE ");
      $_re = _query("SELECT * FROM joind WHERE active_id=$_id ORDER BY reg DESC ");
      while($_member_rows = _fetch_list($_re)){
         $_re_ch = null;
         if($_member_rows["reg"] == 0){
            $_re_ch = "未到";
         }else{
            $_re_ch = "已到";
         }
      ?>
      <tr>
         <td><?php echo $_member_rows["join_name"] ?></td>
         <td>
            <?php echo $_re_ch; ?>
         </td>
      </tr>
      <?php } ?>
   </table>
   <p>
      <a href="modify_active.php?m_id=<?php echo $_row["id"] ?>" id="modify" name="modify">修改</a>
      <a href="?d_id=<?php echo $_row["id"] ?>" id="delete" name="delete">删除</a>
   </p>
</div>
</body>
</html>