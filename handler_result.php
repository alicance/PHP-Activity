<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-22
 * Time: 上午11:17
 */
require_once("include/common.php");
if(isset($_GET["id"])){
   $_id = $_GET["id"];
   $_result = $_GET["result"];
//   $_id = 20;
//   $_result = "90";
   _query("UPDATE actiion SET result='{$_result}' WHERE id=$_id");
}