<?php
ini_set('error_log',dirname(__FILE__).'/error_log.txt');
include_once "./services/mysql.class.php";

// echo PHP_VERSION; 5.3.5

$db_servername="10.0.80.212";
$db_username="root";
$db_password="jxtest";
$db_name="zic";

$db=new db_mysql($db_servername,$db_username,$db_password,$db_name);

$strsql="select * from tb_news";

$rs=$db->fetch_array_pager($strsql,1,5);
foreach($rs as $v){
	//echo $v["num"]."</br>";
}

  
?>