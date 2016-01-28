<?php
 include_once("./smarty/Smarty.class.php");
  include_once("./models/userinfo.php");
 class basePage extends Smarty.class.php{
	 public $userinfo;
	 function __construct(){
		 $this->userinfo=new userinfo();
	 }
 }
?>