<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-21
 * Time: 下午6:11
 */
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
//_change_img_size("img/picture/22.jpg","img/picture/22.jpg");

$dir = "img/picture/";  //要获取的目录

//先判断指定的路径是不是一个文件夹
//if (is_dir($dir)) {
   if ($dh = opendir($dir)) {
      while (($file = readdir($dh)) != false) {
         //文件名的全路径 包含文件名
         $filePath = $dir . $file;
//         echo "<img src='" . $filePath . "'/>";
         _change_img_size($filePath,$filePath);
      }
      closedir($dh);
//   }
}
