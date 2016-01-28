<?php
// 机构类
class mem_orgnize
{
	var $type = 0;
	var $id = 0;	
	var $name="";
	var $desc="";
	var $levle = 0;		// 会员等级
	var $flag1 = 0;		// 会员标识
	var $flag2 = 0;
	var $flag3 = 0;
	var $flag4 = 0;
	
	function getid()
	{
		return $this->id;	
	}
}
// 企业
class mem_company
{
	var $type = 1;
	var $id = 0;	
	var $name="";
	var $desc="";
	var $levle = 0;		// 会员等级
	var $flag1 = 0;		// 会员标识
	var $flag2 = 0;
	var $flag3 = 0;
	var $flag4 = 0;

	
	function getid()
	{
		return $this->id;	
	}
}
?>