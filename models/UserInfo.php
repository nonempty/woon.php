<?php
class UserInfo{
	public $userid;
	public $usertype;
	public $username;
	function __construct(){
		$this->userid=isset ($_SESSION["userid"])?$_SESSION["userid"]:"ddd"; 
		$this->usertype=isset ($_SESSION["usertype"])?$_SESSION["usertype"]:"1";
		$this->username=isset ($_SESSION["username"])?$_SESSION["username"]:"tangqingyun";
	    //echo $this->userid."<br>";
	}
	function __toString()
	{
		return "";
	}
}
?>