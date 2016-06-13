<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午4:55
 */
require_once("include/common.php");

if(isset($_GET["id"])){
   $_id= $_GET["id"];
   $_result = _query("SELECT * FROM joind WHERE active_id=$_id AND join_name='{$_COOKIE["username"]}'");
   if(_num_rows($_result) == 0){
      _query("INSERT INTO joind (active_id,join_name,dated,reg)
                     VALUES (
                             $_id,
                             '{$_COOKIE["username"]}',
                             NOW(),
                             1
                     )");
   }else{
      _query("UPDATE joind SET reg=1 WHERE active_id=$_id AND join_name='{$_COOKIE["username"]}'");
   }
}