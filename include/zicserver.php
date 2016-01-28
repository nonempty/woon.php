<?php
session_start();

	include_once "../config.php"; 
	include_once "./public.php"; 
	include_once "./XmlParser.php"; 



function GetErrorResult ($msgid ="aaaa", $ret = 0)
{
	$xmlmsg = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
	$xmlmsg = $xmlmsg. "<Message Version=\"1.0\">\r\n";
	$xmlmsg = $xmlmsg. "<IE_HEADER MessageId=\"".$msgid."\" SessionId=\"12345678900\" SourceId=\"cms001\" DestId=\"0000000\"  MessageType=\"CFM\" SequenceNumber=\"123456\" />\r\n";
	$xmlmsg = $xmlmsg. "<RESULT  Value=\"".$ret."\" Code =\"".$ret."\" />\r\n";
	$xmlmsg = $xmlmsg. "</Message> \r\n";
	return $xmlmsg;
}
 function OnUserLogin()
 {
 		ShowMsg ("OnUserLogin.1");
	  $userid = $_GET['username'];
		$pwd = $_GET['userpwd'];
 		$userid=trim ($userid);
 		$pwd=trim($pwd);
 	  global $db;
 	  global $dbaddr, $dbuser, $dbpwd, $dbname;
 	  $usertype = 0;
 	  $lastlogintime = "";
		$lastloginip = "";
		$username = "";
		$profit = 0;
		$level = 0;
		$point = 0;
		$auth = 0;

 	  if(!$db)
 	  {
 	  		$db = new db_sql;
 	  		$db->connect($dbaddr, $dbuser, $dbpwd, $dbname);	
			ShowMsg ("receate db .");
 	  }
 	  $sql = "select * from tb_members where userid='".$userid ."' and userpwd='". $pwd."'";
 	   ShowMsg ("query db width ." .$sql);
 	  $query=$db->query($sql);
 	  if(!$query)
 	  {
 	  	echo	GetErrorResult ("LOGIN", 3);
 	  	return;
 	  }
 	  $count = $db->num_rows($query);
 	  $reslut = 2;/// user not found
	  $certificatefile = "";
 	 
 	  if($count > 0)
 	  {
	 	  while($rows=$db->fetch_array($query))
		 	{
		 		 	$usertype = intval ($rows['usertype']);
			 	  $lastlogintime =  $rows['lastlogintime'];
					$lastloginip =  $rows['lastloginip'];
					$username =  $rows['username'];
					$profit =  intval ($rows['profit']);
					$level =  intval ($rows['level']);
					$point =  intval ($rows['point']);
					$auth =  intval ($rows['auth']);
					$certificatefile = $rows['certificatefile'];
					$reslut = 0;
		 			break;
		 	}
		}

 	 
 		
 		ShowMsg ("Server connect ok.");
 		$writer = new DhcXmlWriter;
 	  if (!$writer)
	  {
 			return 12;
 		}
 		$writer->AddXmlMsg ("LOGIN");
 		$writer->AddXmlNode ("RESULT");
		$writer->AddXmlAttribute ("Value", $reslut);
 		$writer->AddXmlAttribute ("Code", $reslut);
 		$writer->AddXmlAttribute ("usertype", $usertype);
 		$writer->AddXmlAttribute ("lastlogintime", $lastlogintime);
 		$writer->AddXmlAttribute ("lastloginip", $lastloginip);
		$writer->AddXmlAttribute ("userid", $userid);
 		$writer->AddXmlAttribute ("username", $username);
 		$writer->AddXmlAttribute ("profit", $profit);
 		$writer->AddXmlAttribute ("level", $level);
 		$writer->AddXmlAttribute ("point", $point);
 		$writer->AddXmlAttribute ("auth", $auth);
		$xml = $writer->GetXmlData();
 		unset($writer);
 		if (!$xml)
 		{
 			SShowMsg ("xml data error.");
 			return 13;
 		}
 		if (strlen($xml) < 10)
 		{
 			ShowMsg ("xml data length error." .strlen($xml)) ;
 			return 14;	
 		}
 		 ShowMsg ("begin to send cmd<br>");
 		 
				
			if(0 == $result)
			{
				 session_start();
	 		  $_SESSION["userid"] = $userid;
	 		  $_SESSION["usertype"] = $usertype;
	 		  $_SESSION["level"] = $level;
	 		  $_SESSION["auth"] = $auth;
	 		  $_SESSION["point"] = $point + 1;
			  
			  $_SESSION["username"] = $username;
			   $_SESSION["certificatefile"] = $certificatefile;
					  
			  $_SESSION["lastlogintime"] = $lastlogintime ;
	 		  $now   = new DateTime;
	 		  
	 		  $lastloginip = $_SERVER["REMOTE_ADDR"];
	 		  $lastlogintime = $now->format( 'Y-m-d H:i:s' );
	 		  $sql = "update tb_members set lastlogintime='$lastlogintime', lastloginip='$lastloginip',point=point+1,failedcount=0 where userid='".$userid ."'";
 	  		$query=$db->query($sql);
 		}
 		else
 		{
 			 		  $sql = "update tb_members set failedcount=failedcount+1 where userid='".$userid ."'";
 	  				$query=$db->query($sql);
 	
 		}
 		   
	 	 	$db->close();
 			echo $xml;

 			return TRUE;
	}
	
function OnLogout()
{
	ShowMsg("Logout ...");
	
	unset ($_SESSION["userid"]);
	unset ($_SESSION["usertype"]);
	unset ($_SESSION["level"]);
	unset ($_SESSION["auth"]);
	unset ($_SESSION["point"]);
	unset ($_SESSION["username"]);
	unset ($_SESSION["lastlogintime"]);
	
	session_unset ();		
	echo GetErrorResult("logout", 0);
}
	
function OnGetIndutryMemo()
{
	ShowMsg ("OnGetIndutryMemo");
		
	$industyid = $_GET['id'];
	
	//global $db;
	//global $dbaddr, $dbuser, $dbpwd, $dbname;
	$db = GetDb();
	
	if(null == $db)
	{
		ShowMsg ("db created new in fun ." );
		$db = new db_sql;
		$db->connect($dbaddr, $dbuser, $dbpwd, $dbname);	
		
	}
	$sql = "select * from tb_bussiness where industryid='".$industyid ."'";
	ShowMsg ("query db width ." .$sql);
	$query=$db->query($sql);
	if(!$query)
	{
		echo	GetErrorResult ("GET_IND_MEMO", 2);
		return;
	}
	$count = $db->num_rows($query);
	if($count < 0)
	{
		echo	GetErrorResult ("GET_IND_MEMO", 2);
		return;
	}
	ShowMsg ("sql return count ". $count);
	$writer = new DhcXmlWriter;
	if (!$writer)
  	{
  		echo	GetErrorResult ("GET_IND_MEMO", 4);
		return TRUE;
	}
	$writer->AddXmlMsg ("GET_IND_MEMO");
	$writer->AddXmlNode ("RESULT");
	$writer->AddXmlAttribute ("Code", 0);
	ShowMsg ("begin to send result\r\n");
	while($rows=$db->fetch_array($query))
	{
		$writer->AddXmlNode ("IND_MEMO");
		$writer->AddXmlAttribute ("businessid", $rows['businessid']);
		$writer->AddXmlAttribute ("businessname", $rows['businessname']);////iconv("utf-8", "gbk",$rows['businessname']));
	}
	$xml = $writer->GetXmlData();
 	unset($writer);
	if (!$xml)
	{
		SShowMsg ("xml data error.");
		return 13;
	}
	if (strlen($xml) < 10)
	{
		ShowMsg ("xml data length error." .strlen($xml)) ;
		return 14;	
	}
 	ShowMsg ("begin to send result\r\n");
 	$db->close();
	echo $xml;
 	return TRUE;
}

function OnGetBussionessSubItem()
{
	ShowMsg ("OnGetBussionessSubItem");
		
	$industyid = $_GET['id'];
	
	//global $db;
	//global $dbaddr, $dbuser, $dbpwd, $dbname;
	$db = GetDb();
	
	if(null == $db)
	{
		ShowMsg ("db created new in fun ." );
		$db = new db_sql;
		$db->connect($dbaddr, $dbuser, $dbpwd, $dbname);	
		
	}
	$sql = "select * from tb_bussinesssub where businessid='".$industyid ."'";
	ShowMsg ("query db width ." .$sql);
	$query=$db->query($sql);
	if(!$query)
	{
		echo	GetErrorResult ("GET_BU_SUB_ITEM", 2);
		return;
	}
	$count = $db->num_rows($query);
	if($count < 0)
	{
		echo	GetErrorResult ("GET_BU_SUB_ITEM", 3);
		return;
	}
	ShowMsg ("sql return count ". $count);
	$writer = new DhcXmlWriter;
	if (!$writer)
  	{
  		echo	GetErrorResult ("GET_BU_SUB_ITEM", 4);
		return TRUE;
	}
	$writer->AddXmlMsg ("GET_BU_SUB_ITEM");
	$writer->AddXmlNode ("RESULT");
	$writer->AddXmlAttribute ("Code", 0);
	ShowMsg ("begin to send result\r\n");
	while($rows=$db->fetch_array($query))
	{
		$writer->AddXmlNode ("CHECK_ITEM");
		$writer->AddXmlAttribute ("bussinesssubid", $rows['bussinesssubid']);
		$writer->AddXmlAttribute ("bussinesssubname", $rows['bussinesssubname']);////iconv("utf-8", "gbk",$rows['businessname']));
	}
	$xml = $writer->GetXmlData();
 	unset($writer);
	if (!$xml)
	{
		SShowMsg ("xml data error.");
		return 13;
	}
	if (strlen($xml) < 10)
	{
		ShowMsg ("xml data length error." .strlen($xml)) ;
		return 14;	
	}
 	ShowMsg ("begin to send result\r\n");
 	$db->close();
	echo $xml;
 	return TRUE;	
}
function OnCheckRegId()
{
	ShowMsg ("OnCheckRegId.");
	  $userid = $_GET['memberid'];
		
 	  global $db;
 	  global $dbaddr, $dbuser, $dbpwd, $dbname;

 	  if(!$db)
 	  {
 	  		$db = new db_sql;
 	  		$db->connect($dbaddr, $dbuser, $dbpwd, $dbname);	
			ShowMsg ("receate db .");
 	  }
	  if(!$db)
	  	return;
 	  $sql = "select userid from tb_members where userid='".$userid ."'";
 	  ShowMsg ("query db width ." .$sql);
 	  $query=$db->query($sql);
 	  if(!$query)
 	  {
 	  	 echo	GetErrorResult ("CHECK_MEM_ID", 0);
		  $db->close();
 	  	 return;
 	  }
 	  $count = $db->num_rows($query);
 	  $db->close();
 	  if($count > 0)
 	  {
	 		echo	GetErrorResult ("CHECK_MEM_ID", 2); 
	  }
	  else
	  {
			echo	GetErrorResult ("CHECK_MEM_ID", 0);   
	  }
	 	 	
 	

 	return TRUE;
}


	
?>