<?php
// ������
class mem_orgnize
{
	var $type = 0;
	var $id = 0;	
	var $name="";
	var $desc="";
	var $levle = 0;		// ��Ա�ȼ�
	var $flag1 = 0;		// ��Ա��ʶ
	var $flag2 = 0;
	var $flag3 = 0;
	var $flag4 = 0;
	
	function getid()
	{
		return $this->id;	
	}
}
// ��ҵ
class mem_company
{
	var $type = 1;
	var $id = 0;	
	var $name="";
	var $desc="";
	var $levle = 0;		// ��Ա�ȼ�
	var $flag1 = 0;		// ��Ա��ʶ
	var $flag2 = 0;
	var $flag3 = 0;
	var $flag4 = 0;

	
	function getid()
	{
		return $this->id;	
	}
}
?>