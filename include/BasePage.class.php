<?php
include_once "./smarty/Smarty.class.php";
include_once "./models/UserInfo.php";
 class BasePage extends Smarty {
	 public $userinfo;//用户信息
	 function __construct(){
		 parent::__construct();  //调用父类构造方法  
		 /*$smarty->template_dir = './templates/';
         $smarty->compile_dir = './templates_c/';
         $smarty->config_dir = './configs/';
         $smarty->cache_dir = './cache/';*/
		 $this->userinfo=new UserInfo();
	 }
	 
 }
?>