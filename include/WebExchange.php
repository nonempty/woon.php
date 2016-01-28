<?php
session_start();

if (!isset($_SESSION["SessionId"]))
{
	
	if (file_exists("./include/zicserver.php"))
	{
		include_once "./include/zicserver.php"; 
		ShowMsg ("file found1");
	}
	else
	{
		if (file_exists("./zicserver.php"))
		{
			include_once "./zicserver.php"; 
			ShowMsg ("file found2");
		}
		else
			ShowMsg ("file not found1");
	}
}

 $cmd =$_GET['cmd'];
 if (!$cmd)
 {
	 $cmd = $_POST['cmd'];
 }
ShowMsg ("Recv command ". $cmd);
if("login" == $cmd)
{
	OnUserLogin();
}
else if("logout" == $cmd)
{
	OnLogout ();
}
else if("loginOut"==$cmd){
	OnLogout ();
}
else if ("getindmemo" == $cmd)
{
	OnGetIndutryMemo();
}
else if("getcheckitem" == $cmd)
{
	OnGetBussionessSubItem();
}
else if ("check_reg_id"== $cmd)
{
	OnCheckRegId();
}
else
{
	ShowMsg ("Unknown command ". $cmd);
}
	
	
?>