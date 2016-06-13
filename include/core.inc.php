<?php
/**
 * Created by PhpStorm.
 * User: Alic
 * Date: 15-6-19
 * Time: 下午8:17
 */
//防止非法调用
IF(!defined("AL_NAME")){
    echo "<script>alert('非法调用')</script>";
}

/***
 * 警告函数
 * @param $_string
 */
function _alert($_string){
    echo "<script>alert('$_string')</script>";
}

/***
 * 跳转页面
 * @param $_info
 * @param $_url
 */
function _location($_info,$_url){
    echo "<script type='text/javascript'> alert('$_info') ; location.href='$_url';</script>";
    exit();
}

/***
 *
 */
function _back(){
    echo "<script>window.history</script>";
}

/***
 * 设置cookie
 * setcookie()
 * @param $_username
 * @param $_password
 * @param $_email
 */
function _set_cookies($_username){
    setcookie("username",$_username);
}

function _delete_cookie(){
    setcookie("username","",time()-1);
}
function _isset_cookie(){
   if(!isset($_COOKIE["username"])){
//      header("Location:index.php");
      _set_cookies("游客");
   }
}

/**
 * _thumb缩略图函数
 * @param $_file_name
 * @param $_percent
 */
function _thumb($_file_name){
   //生成标头文件
   header('Content-Type:image/png');
//获取文件扩展名
   $_n = explode('.',$_file_name);
//获取图片的长和高
   list($_width, $_height) = getimagesize($_file_name);
//定义缩略图的长与高
   $_new_width = 67;
   $_new_height = 60;
//定义新的画布
   $_new_image = imagecreatetruecolor($_new_width, $_new_height);
//创建已有画布
//    $_img = '';
   switch ($_n[1]) {
      case "jpg" :
         $_img = imagecreatefromjpeg($_file_name);
         break;
      case "gif" :
         $_img = imagecreatefromgif($_file_name);
         break;
      case "png" :
         $_img = imagecreatefrompng($_file_name);
         break;
   }
//copy重叠画布显示
   imagecopyresampled($_new_image,$_img,0,0,0,0,$_new_width,$_new_height,$_width,$_height);
   //显示图片
   imagepng($_new_image);
   imagedestroy($_img);
   imagedestroy($_new_image);
}


/**
 * desription 压缩图片
 * @param sting $imgsrc 图片路径
 * @param string $imgdst 压缩后保存路径
 */
function _change_img_size($imgsrc,$imgdst){
   list($width,$height,$type)=getimagesize($imgsrc);
   $new_width = ($width>600?600:$width)*1;
   $new_height =($height>600?600:$height)*1;
   switch($type){
      case 1:
         $giftype=check_gifcartoon($imgsrc);
         if($giftype){
            header('Content-Type:image/gif');
            $image_wp=imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromgif($imgsrc);
            imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_wp, $imgdst,75);
            imagedestroy($image_wp);
         }
         break;
      case 2:
         header('Content-Type:image/jpeg');
         $image_wp=imagecreatetruecolor($new_width, $new_height);
         $image = imagecreatefromjpeg($imgsrc);
         imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
         imagejpeg($image_wp, $imgdst,75);
         imagedestroy($image_wp);
         break;
      case 3:
         header('Content-Type:image/png');
         $image_wp=imagecreatetruecolor($new_width, $new_height);
         $image = imagecreatefrompng($imgsrc);
         imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
         imagejpeg($image_wp, $imgdst,75);
         imagedestroy($image_wp);
         break;
   }
}