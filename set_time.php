<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-21
 * Time: 下午6:27
 */
ignore_user_abort();//关闭浏览器后，继续执行php代码
set_time_limit(0);//程序执行时间无限制
do {
   require("change_img.php");
   sleep(10);
} while (true);