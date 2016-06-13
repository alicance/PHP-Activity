<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-20
 * Time: 下午5:42
 */

define("SCRIPT","up_video");
require_once("include/common.php");
_isset_cookie();
if(isset($_GET["id"])){
   $_id = $_GET["id"];
}
if (isset($_POST["up_btn"])) {
//   echo $_FILES["video"]["type"];exit;
   /*先保存照片*/
   $_file_type = array("video/mp4","application/octet-stream");
   //判断文件的类型
   if (!in_array($_FILES["video"]["type"], $_file_type)) {
      _alert("图片格式不正确");
   }
   //配置被上传文件的大小
    if($_FILES["video"]["size"] > 1000000000){
        _alert_back("视频太大");
        exit;
    }
   //判断文件是否存在
   if(is_uploaded_file($_FILES["video"]["tmp_name"])){
      //获取临时文件名
      $_tmp_file = $_FILES["video"]["tmp_name"];
      //获取文件名
      $_name = explode(".",$_FILES["video"]["name"]);
      //定义上传文件的路径
      $_url = "video/".time().".".$_name[1];
      //移动(上传)文件
      if(move_uploaded_file($_tmp_file,$_url)){
      }
   }

   //然后上传数据
   $_clean = array();
   $_clean["active_id"] = $_id;
   $_clean["video"] = $_url;
   $_clean["descr"] = $_POST["descr"];
   $_clean["handler"] = $_COOKIE["username"];
   $_clean["date"] = date("n月d日 H:i:s");
//   print_r($_clean);
//   exit;
   _query("INSERT INTO video (
                            active_id,
                            video,
                            descr,
                            handler,
                            dated
                  ) VALUES (
                            '{$_clean["active_id"]}',
                            '{$_clean["video"]}',
                            '{$_clean["descr"]}',
                            '{$_clean["handler"]}',
                            '{$_clean["date"]}'
                  )");
   if(_affected_rows() == 1){
      header("Location:reveal_video.php?id=$_id");
   }
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="UTF-8">
   <?php require_once("include/header_script.php"); ?>
   <title>分享视频</title>
</head>
<body>
<?php require_once("include/header_div.php"); ?>
<div id="content">
   <?php require_once("include/hidden.php") ?>
   <form action="?id=<?php echo $_id ?>" method="post" enctype="multipart/form-data">
      <p>
         请选择要上传的视频
      </p>
      <p>
         <label>
            <input type="file" name="video">
         </label>
      </p>
      <p>视频的描述</p>
      <p>
         <label>
            <textarea name="descr" placeholder="您在此刻的想法..."></textarea>
         </label>
      </p>
      <p>
         <input type="submit" name="up_btn" value="上传" id="up_btn">
      </p>
      <p class="tip">请选择您要上传的视频</p>
   </form>
</div>
</body>
</html>