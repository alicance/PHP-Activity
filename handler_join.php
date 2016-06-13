<?php
/**
 * Created by PhpStorm.
 * User: alic
 * Date: 15-7-18
 * Time: 下午10:22
 */
require_once("include/common.php");

if(isset($_GET["id"])){
   $_act_id = $_GET["id"];
   $_join_name = $_COOKIE["username"];
   $_result = _query("SELECT * FROM joind WHERE active_id='{$_act_id}' AND join_name='{$_join_name}'");
   if(!empty($_result)){
      _query("INSERT INTO joind (active_id,join_name,dated)
                      VALUES (
                              '{$_act_id}',
                              '{$_join_name}',
                              NOW()
                      )");
   }
}