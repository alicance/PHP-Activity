<?php
/**
 * Created by PhpStorm.
 * User: Alic
 * Date: 15-6-19
 * Time: 下午8:02
 */
//防止非法调用
IF(!defined("AL_NAME")){
    echo "<script>alert('非法调用')</script>";
}

/***
 * 连接mysql
 * _connect()
 */
function _connect(){
    if(!mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)){
        _alert("数据库连接失败");
    }
}

/***
 * 选择具体数据库
 * _select_db()
 */
function _select_db(){
    if(!mysql_select_db(DB_NAME)){
        _alert("数据库选择失败");
    }
}

/***
 * 设置字符集
 * _set_names()
 */
function _set_charset(){
    if(!mysql_query("SET NAMES utf8")){
        _alert("字符集设置出错");
    }
}

/***
 * 数据库执行语句
 * _query()
 * @param $_string
 * @return resource
 */
function _query($_string){
    if($_result = mysql_query($_string)){
        return $_result;
    }else{
        die(mysql_error());
//        exit("SQL执行失败");
    }
}

/***
 * 检测数据是否被导入
 * _affected_rows()
 */
function _affected_rows(){
    return mysql_affected_rows();
}

/***
 * 获得数据库中的结果集
 * @param $_string
 * @return array
 */
function _fetch_list($_string){
    $_result = mysql_fetch_array($_string,MYSQL_ASSOC);
    return $_result;
}

/***
 * 匹配用户
 * @param $_string
 * @return array
 */
function _affect_array($_string){
    return mysql_fetch_array(_query($_string),MYSQL_ASSOC);
}

/***
 * 统计条数
 * @param $_result
 * @return int
 */
function _num_rows($_result){
    return mysql_num_rows($_result);
}
