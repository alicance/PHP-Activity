<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 上午11:13
 */
define("SCRIPT","new_active");
require_once("include/common.php");
_isset_cookie();

if(isset($_POST["btn_new"])){
   //判断文件夹爱是否存在
      if (!is_dir("img/picture")) {
         mkdir("img/picture", 777);
      }
   /*线上传图片*/
   $_file_type = array("image/jpg","image/jpeg","image/pjpeg","image/png","image/gif");

//   echo $_FILES["act_photo"]["type"];

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
//         _change_img_size($_url,$_url);
      }
//   exit;

   $_html = array();
   $_html["act_name"] = $_POST["act_name"];
   $_html["act_group"] = $_POST["act_group"];
   $_html["act_place"] = $_POST["act_place"];
   $_html["act_s_date"] = $_POST["act_s_date"];
   $_html["act_s_time"] = $_POST["act_s_time"];
   $_html["act_e_date"] = $_POST["act_e_date"];
   $_html["act_desc"] = $_POST["act_desc"];
   $_html["photo"] = $_url;
//   print_r($_html);
//   exit;
   /*将数据存入到数据库里面*/
   _query("INSERT INTO actiion (
                                named,
                                ground,
                                placed,
                                dates,
                                times,
                                datee,
                                descr,
                                photo,
                                handler,
                                handler_time
                                       )
                                  VALUES
                               (
                               '{$_html["act_name"]}',
                               '{$_html["act_group"]}',
                               '{$_html["act_place"]}',
                               '{$_html["act_s_date"]}',
                               '{$_html["act_s_time"]}',
                               '{$_html["act_e_date"]}',
                               '{$_html["act_desc"]}',
                               '{$_html["photo"]}',
                               '{$_COOKIE["username"]}',
                               NOW()
                               )");
   if(_affected_rows() == 1){
//      _location("创建活动成功","reveal_active.php");
      header("Location:reveal_active.php");
   }else{
      _alert("抱歉,服务器出错 请重试...");
      exit;
   }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
    <title>发起活动</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <form method="post" action="?" enctype="multipart/form-data">
      <p>
         <label for="act_name">
            活动主题:
            <input type="text" name="act_name" id="act_name" class="txt" placeholder="请输入活动的名称 10字内">
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
                      <option value="<?php echo $_rows["id"] ?>">
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
            <input type="text" name="act_place" id="act_place" class="txt" placeholder="请输入活动的地点">
         </label>
      </p>
      <p>
      <p>
         <label for="act_s_date">
            开始日期:
            <input type="text" name="act_s_date" id="act_s_date" class="txt" placeholder="请输入活动的开始日期">
         </label>
      </p>
      <p>
         <label>
            开始时间:
            <input type="text" id="act_s_time" name="act_s_time" class="txt" placeholder="请输入活动的开始时间">
         </label>
      </p>
      <p>
         <label for="act_e_date">
            结束日期:
            <input type="text" name="act_e_date" id="act_e_date" class="txt" placeholder="请输入活动的结束日期">
         </label>
      </p>
      <p>
         <label for="act_photo">
            主题封面:
            <input type="file" name="act_photo" id="act_photo">
         </label>
      </p>
      <p>
         <label id="act_desc">
            <textarea id="act_desc" name="act_desc" placeholder="请输入活动的描述"></textarea>
         </label>
      </p>
         <input type="submit" id="btn_new" value="创建活动" name="btn_new">
   </form>
</div>

</body>
</html>