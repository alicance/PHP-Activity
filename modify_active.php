<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 上午11:13
 */
define("SCRIPT","modify_active");
require_once("include/common.php");
_isset_cookie();

if(isset($_POST["btn_new"])){
   //判断照片是否为空
   if(($_FILES["act_photo"]["size"]==0)){
      $_html = array();
      $_html["act_name"] = $_POST["act_name"];
      $_html["act_group"] = $_POST["act_group"];
      $_html["act_place"] = $_POST["act_place"];
      $_html["act_s_date"] = $_POST["act_s_date"];
      $_html["act_s_time"] = $_POST["act_s_time"];
      $_html["act_e_date"] = $_POST["act_e_date"];
      $_html["act_desc"] = $_POST["act_desc"];
      _query("UPDATE actiion SET named='{$_html["act_name"]}',
                                ground={$_html["act_group"]},
                                placed='{$_html["act_place"]}',
                                dates='{$_html["act_s_date"]}',
                                times='{$_html["act_s_time"]}',
                                datee='{$_html["act_e_date"]}',
                                descr='{$_html["act_desc"]}',
                                handler='{$_COOKIE["username"]}'
                             WHERE id={$_GET["id"]}
                                ");
//      print_r($_html);
      if(_affected_rows() == 1){
         header("Location:reveal_active.php");
//         exit;
      }else{
         _location("服务器出错,请重试...","modify_active.php?id={$_GET["id"]}");
      }
   }else{
      //判断文件夹爱是否存在
      if (!is_dir("img/picture")) {
         mkdir("img/picture", 777);
      }
      /*线上传图片*/
      $_file_type = array("image/jpg","image/jpeg","image/pjpeg","image/png","image/gif");

      //判断文件的类型
      if(!in_array($_FILES["act_photo"]["type"],$_file_type)){
         _alert("图片格式不正确");
      }
      if (is_uploaded_file($_FILES["act_photo"]["tmp_name"])) {
         //获取临时文件名
         $_tmp_file = $_FILES["act_photo"]["tmp_name"];
         //获取文件名
         $_name = explode(".", $_FILES["act_photo"]["name"]);
         //定义上传文件的路径
         $_url = "img/picture/" . time() . "." . $_name[1];
         //移动(上传)文件
         if (move_uploaded_file($_tmp_file, $_url)) {
         }
      }

      $_html = array();
      $_html["act_name"] = $_POST["act_name"];
      $_html["act_group"] = $_POST["act_group"];
      $_html["act_place"] = $_POST["act_place"];
      $_html["act_s_date"] = $_POST["act_s_date"];
      $_html["act_s_time"] = $_POST["act_s_time"];
      $_html["act_e_date"] = $_POST["act_e_date"];
      $_html["act_desc"] = $_POST["act_desc"];
      $_html["url"] = $_url;
//      print_r($_html);exit;
      _query("UPDATE actiion SET named='{$_html["act_name"]}',
                                ground={$_html["act_group"]},
                                placed='{$_html["act_place"]}',
                                dates='{$_html["act_s_date"]}',
                                times='{$_html["act_s_time"]}',
                                datee='{$_html["act_e_date"]}',
                                descr='{$_html["act_desc"]}',
                                handler='{$_COOKIE["username"]}',
                                photo='{$_html["url"]}'
                             WHERE id={$_GET["id"]}
                                ");
//      print_r($_html);
      if(_affected_rows() == 1){
         header("Location:reveal_active.php");
//         exit;
      }else{
         _location("服务器出错,请重试...","modify_active.php?id={$_GET["id"]}");
      }
   }
//   exit;
}
$_id = $_GET["id"];
$_html = _affect_array("SELECT * FROM actiion WHERE id=$_id");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>修改活动</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <form method="post" action="?id=<?php echo $_id ?>" enctype="multipart/form-data">
      <p>
         <label for="act_name">
            活动主题:
            <input type="text" name="act_name" id="act_name" class="txt" value="<?php echo $_html["named"] ?>">
         </label>
      </p>
      <p>
         <label>
            活动团队:
            <select class="txt" name="act_group">

               <?php
               $_result = _query("SELECT * FROM groupd");
               while($_rows = _fetch_list($_result)){
                  $_array = explode("/",$_rows["member"]);
                  if(in_array($_COOKIE["username"],$_array)){ ?>
                      <option value="<?php echo $_rows["id"] ?>"
                          <?php if($_rows["id"] == $_html["ground"]){echo "selected";} ?>>
                         <?php echo $_rows["named"] ?>
                      </option>
                  <?php  }?>
               <?php } ?>

            </select>
         </label>
      </p>
      <p>
         <label for="act_place">
            活动地点:
            <input type="text" name="act_place" id="act_place" class="txt" value="<?php echo $_html["placed"] ?>">
         </label>
      </p>
      <p>
      <p>
         <label for="act_s_date">
            开始日期:
            <input type="text" name="act_s_date" id="act_s_date" class="txt" value="<?php echo $_html["dates"] ?>">
         </label>
      </p>
      <p>
         <label>
            开始时间:
            <input type="text" id="act_s_time" name="act_s_time" class="txt" value="<?php echo $_html["times"] ?>">
         </label>
      </p>
      <p>
         <label for="act_e_date">
            结束日期:
            <input type="text" name="act_e_date" id="act_e_date" class="txt" value="<?php echo $_html["datee"] ?>">
         </label>
      </p>
      <p>
         <label for="act_photo">
            上传新封面:
            <input type="file" name="act_photo" id="act_photo">
         </label>
      </p>
      <p>
         <label id="act_desc">
            <textarea id="act_desc" name="act_desc"><?php echo $_html["descr"] ?>
            </textarea>
         </label>
      </p>
      <p>
         <img src="<?php echo $_html["photo"] ?>" width="80%">
      </p>
         <input type="submit" id="btn_new" value="修改活动" name="btn_new">
   </form>
</div>

</body>
</html>