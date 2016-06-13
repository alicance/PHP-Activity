<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午4:08
 */
?>
<header id="head">
   <p>
      <em id="header_act"><img src="img/logo/menu.png"></em>
      <em id="header_name">
         <?php
         if(isset($_COOKIE["username"])){
            echo $_COOKIE["username"];
         }else{
            echo "<a href='index.php'>登录</a>";
         }
         ?>
      </em>
   </p>
</header>