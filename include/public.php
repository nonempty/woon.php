<?php
	$cur_path =  dirname(__FILE__); /// C:\www\zic\include
	include_once $cur_path."/../config.php";
	include_once $cur_path."/db_mysql.php";
function GetDb()
{
	
	global $db;	
	global $dbaddr, $dbuser, $dbpwd, $dbname;
	if(null == $db)
	{
		$db = new db_sql;
		ShowMsg ("create new db");
		$db->connect($dbaddr, $dbuser, $dbpwd, $dbname);	
		ShowMsg ("create new db ok");
	}
	return $db;
} 
function query($sql){
	$db = GetDb();
	$arr= array();
	$result=$db->query($sql);
	if(!$result) {
		return $arr;
	}
	while($rows=$db->fetch_array($result)){
		$arr[]=$rows;
	}
	$db->close();
	return $arr;
}
/*
获取分页数 返回结果数组 arr["count"]总条数 arr["list"](结果数组) range(范围)
*/
function getPager($sql_count,$sql_query,$page,$pagesize,$isall=true){
	 if(!$db){
		$db=GetDb();
	 }
	 $querycount = $db->query($sql_count);
	 $num = mysql_num_rows($querycount);
	 $result=array();
	 
	 if(isall){ 
		 $startindex=($page-1)* $pagesize;//开始位置
		 $sql_query=$sql_query." limit ".$startindex.",".$pagesize;
		 $query = $db->query($sql_query);
		 while($rows = $db->fetch_array($query))
		 {
			$result[] = $rows;
		 }
	 }
	 
	 $db->close();
	 return array("count"=>$num,"list"=>$result,"range"=>$startindex."-".($startindex+$pagesize));
}
function ShowMsg($msg)
{
	global $gFile;
	
	if (NULL == $gFile)
	{
		return;
	}
	$msg = $msg."\r\n";
	if ($gFile)
	{
		date_default_timezone_set ("Asia/Shanghai");
		fwrite($gFile, date('Y-m-d H:i:s '));
		fwrite($gFile, $msg);
		if (ftell ($gFile) > 20240000)
		{
				fclose ($gFile);
				 $gFile = fopen ("c:/www/zic/msglog.txt", "wb");
		}

	}
}
function GetParam ($param)
{
	$ParamValue = null;
	if(isset ($_GET[$param]))
			$ParamValue = $_GET[$param];
	else if (isset ($_POST[$param]))
			$ParamValue = $_POST[$param];	
	return $ParamValue;
}
function getBrowser()
{
    $agent=$_SERVER["HTTP_USER_AGENT"];
    if(strpos($agent,'MSIE')!==false || strpos($agent,'rv:11.0')) //ie11判断
    return "ie";
    else if(strpos($agent,'Firefox')!==false)
    return "firefox";
    else if(strpos($agent,'Chrome')!==false)
    return "chrome";
    else if(strpos($agent,'Opera')!==false)
    return 'opera';
    else if((strpos($agent,'Chrome')==false)&&strpos($agent,'Safari')!==false)
    return 'safari';
    else
    return 'unknown';
}


?>