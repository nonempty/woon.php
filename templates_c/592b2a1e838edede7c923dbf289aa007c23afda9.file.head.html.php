<?php /* Smarty version Smarty-3.0.6, created on 2016-01-24 09:13:15
         compiled from ".\templates\head.html" */ ?>
<?php /*%%SmartyHeaderCode:1549156a495ab766dc0-43556344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '592b2a1e838edede7c923dbf289aa007c23afda9' => 
    array (
      0 => '.\\templates\\head.html',
      1 => 1453626780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1549156a495ab766dc0-43556344',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<SCRIPT src="./js/public.js" type="text/javascript"></SCRIPT>
<SCRIPT src="./js/user.js" type="text/javascript"></SCRIPT>
<script type="text/javascript" >

	var gUserId ="<?php echo $_smarty_tpl->getVariable('userinfo')->value->userid;?>
";
	var gUserType ="<?php echo $_smarty_tpl->getVariable('userinfo')->value->usertype;?>
";
	var gUserName ="<?php echo $_smarty_tpl->getVariable('userinfo')->value->username;?>
";
	$(document).ready(function(){
		//alert ("ok");
			//	set_first_line();
	})
	function contact_online_service()
	{
		if(gUserId.length  < 2)
		{
			window.open ("./offline_help.php");
		}	
		else
		{
			//	window.open ("./online_service.php");
			logout();
		}
	}
	
	
	
function showsearch()
{
 var obj = document.getElementById("main_heaer_search_content");
 if("block" == obj.style.display)
 {
 		obj.style.display = "none";
}
else
{
	obj.style.display = "block";
}

}
function set_search_lib(oSel)
{
	var oSerch = document.getElementById("searchcontent1");
 	oSerch.value = oSel.innerText;
	oSerch.innerText = oSel.innerText;
	var obj = document.getElementById("main_heaer_search_content");
	obj.style.display="none";
}

function search_on_enter()
{
 
	if (13 == window.event.keyCode)  // checks whether the ENTER key 
	{
		searchinlib(); 
	}

}
function searchinlib()
{
	var obj = document.getElementById("searchvalue");
	var vValue = trim(obj.value);

	obj = document.getElementById("searchcontent1");
	var vlib = trim(obj.innerText);
	
	window.open("./searchresult.php?searchvalue=" + vValue + "&lib=" + vlib);
}
function ShowSelfPage()
{
	if("" == gUserId)
	{
		alert ("请先登录！");
		return ;
	}
	var url = "./myself_org.php";	
	if(1 == gUserType)
	{
		
	}
	else if(2 == gUserType)
	{
		
	}
	else if(3 == gUserType)
	{
		
	}
	
	window.open(url, "_self");
	
}

function logininfirstline()
{
	var obj = document.getElementById("main_login_box");
	
	if(obj)
	{
		
		window.scroll(0, 50);	
		obj.focus();
		obj.value = "";
		obj.style.borderColor="#F30";
	}
	else
	{
		var obj = document.getElementById("firstline_login_box");
		obj.style.display = "block";
	//	alert (obj.style.display );
		//window.open("login.html", "_blank", "channelmode=yes,directories=no,fullscreen=no,height=400,width=300,location=no,left=500,top=400,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no");
	}


}
function firstlineuserlogin()
{
	userlogin();
	
	var obj = document.getElementById("firstline_login_box");
	obj.style.display = "none";

		
}
	
    function set_bk_blue1 (obj, b)
   {

		if(b)
		 {
			 	obj.style.backgroundColor = "#389c5e";
				obj.style.color = "white";
		 }
		else 
		{
				obj.style.backgroundColor = "white"; 
				obj.style.color = "black";
		}
   }

</script>
<div style=" position:relative; left:0px; top:0px;">
<style>
td.mywidth
{
	width:80px;
	height:45px;
	line-height:45px;
	position:relative; 
	top:0px;
	background-color:;
}
td.mywidth1
{
	width:65px;
	height:45px;
	line-height:45px;
	position:relative; 
	top:0px;
	padding:0px;
	margin:0px;

}
div.flmenu
{
display:none;position:absolute;left:0px;top:26px;width:90px;background-color:white;border-radius:0px; text-align:center;z-index:12; opacity:1; color:black; border-radius:9px;
}
div.select_content_item1
{
	border:0px;
	position:relative;
	height:26px;
	left:0px;
	margin-bottom:0px;
	text-align:center;
	font-family:'Bauhaus ITC';
	font-weight:100;
	vertical-align:middle;
	padding-top:2px;
	line-height:26px;
	font-size:16px;
	background-color:white;
	opacity:1;
	 border-radius:9px;
}
.flmenu div:hover 
{
	
	background-color:#F15D2D;	
}
#main_heaer_search_box1
{
	 position:relative;
	 padding:0px;
	 margin:0px;
	 left:1px;
	 top:1px;	
	 width:284px;
	 height:45px; 	
	
	 background-color:red;
	 display:none;
}
div.firstline_login_box
{
	 position:fixed;
	 background-color:#333;
	 font-family:'Bauhaus ITC','Microsoft YaHei'; /* 'AdobeHeitiStd-Regular',*/
	 left:512px;
	 top:220px;	
	 height:300px;
	 width:300px; 
	 border-radius:6px;
	
	 padding-left:5px;
	 padding-right:5px;
	 display:none;
}
</style>

<div  style="position:absolute; left:110px;top:11px;height:60px; width:265px;padding:0px;margin:0px;"padding-left:10px;" >
<img  src="./images/logo.png" style="position:relative;left:0px;top:0px;border:none;padding:0px;margin:0px;cursor:pointer;  background-color:;"  onclick="window.open('./', '_self');" height="60px"/>	
</div>
	<div id="search_box" name="search_box" style="position:absolute; left:380px; top:13px; height:40; width:595px; background-color:#e7e1e1; border-radius:9px;font-family:'Bauhaus ITC','Microsoft YaHei';">
                            <div id="searchcontent1" name="searchcontent1" type="text"  onclick="showsearch();" 
                             style="position:relative; left:0px;top:5px;height:26px;width:90px; line-height:18px;border:none;font-weight:lighter;border-radius:1px;font-size:16px;padding-top:0px;padding-left:0x; padding-right:6px;margin:0px;background-image:url('./images/drop_show.png');background-repeat:no-repeat;background-position:84px 34%; background-color:; vertical-align:middle; z-index:2;font-family:'Bauhaus ITC','Microsoft YaHei';color:black;text-align:center;"> 
                       检验认证
							 </div>
                              
                                <input id="searchvalue" name="searchvalue" type="text"  value=""  onkeypress="search_on_enter();" style="position:absolute; top:3px;left:100px;height:22px; width:451px; border:none;font-size:16px;padding-left:4px;margin:0px;opacity:1;color:black; background-color: #e7e1e1; padding-top:0px; padding-bottom:0px; line-height:22px; " />
                                
                          <img  src="./images/search.png" onclick="searchinlib();"  width="20px" height="20px" style="position:absolute; top:3px;left: 560px;"/>	
                       
                      
                        <div id="main_heaer_search_content" name="main_heaer_search_content" 
                            class="flmenu"> 
                                
                                     <div class="select_content_item1" onclick="set_search_lib(this);"> 检验认证 </div>
                                     <div class="select_content_item1" onclick="set_search_lib(this);"> 专家库 </div>
                                     <div class="select_content_item1" onclick="set_search_lib(this);"> 标准库 </div>
                                     <div class="select_content_item1" onclick="set_search_lib(this);"> 机构库 </div>
                                  	
                        </div>	
           </div>
           
<table id="tbfirstline" name="tbfirstline" cellpadding="0" border="0" style="font-family:'Bauhaus ITC','Microsoft YaHei';font-size:16px;color:white; vertical-align:middle; display:block;margin:0; padding:0px; background-color:; position:absolute; left:380px;top:50px;height:40px; ">
<tr > 


    
    <td  style=" padding-right:20px;">
			<a href="./news.php" style="color:white;text-decoration: none;" >新闻</a>
	</td>
    <td style="padding-right:20px;" >
			<a href="./underconstruction.php" style="color:white ;text-decoration: none;">检验检测</a>
	</td>
      <td   style="padding-right:20px;">
			<a href="./underconstruction.php" style="color:white;text-decoration: none;">注册认证</a>
	</td>
    
     <td  style="padding-right:20px;">
			<a href="./underconstruction.php" style="color:white;text-decoration: none;">ZIC数据库</a>
	</td>
    
     <td style="padding-right:20px;" >
			<a href="./underconstruction.php" style="color:white;text-decoration: none;">ZIC实验室联盟</a>
	</td>
  
  
   <td style="padding-right:20px;" >
			<a href="###" onclick="ShowSelfPage();" style="color:white;text-decoration: none;">我的ZIC</a>
	</td>
    <td style="padding-right:20px;" >
			<a href="###" onclick="logoutinfirstline();" style="color:white;text-decoration: none;">退出登录</a>
	</td>
    <td style="padding-right:10px;font-size:16px; display:none;" >
    	<div>
			<div id="divloginreg" name="divloginreg" style="display:block">
           		 <span onclick="regitsernewuser();" style="cursor:pointer;"> 注册</span> / <span onclick="logininfirstline();" style="cursor:pointer;"> 登录</span>
            </div>
            <div id="divlogout" name="divlogout" style="display:none;">
           		 <span onclick="logoutinfirstline();" style="cursor:pointer;"> 退出</span>
            </div>
          </div>
	</td>
</tr>
</table>

<table style="position:absolute;left:1000px;top:13px;width:110px; text-align:right;padding-right:20px;" >
<tr>

<td>

        <div  >
			<!---- 语言选择 --->
            <div id="main_header_lang1" name="main_header_lang1" style="position:relative;top:6px;">
            <img src="./images/chinese.png"  title="已经是中文了"  width="30px" height="20px" />
            &nbsp;
            <img src="./images/english.png" title="GoToEnglish" onclick="switch_to_english();" style="cursor:pointer;" width="30px" height="20px"/>
            </div>
	</div>
 </td>
  </tr>
  
 <tr>
 
<td>  
     <div  id="freetel" style="font-size:16px; background-color:;font-family:'Bauhaus ITC','Microsoft YaHei'; width:240px; color:white;margin-top:5px;">
	
                免费咨询电话: <span style=" font-weight:bold;font-size:16px;" >400-800-6666 </span>
                

	</div>

</td>
  </tr>
  
  </table>

     	
            <div id="div_online_service" name="div_online_service" style="background-image:url('./images/service_online.png'); background-repeat:no-repeat; background-size:70% 70%;  top:2px; cursor:pointer; position:absolute;left:1100px;top:30px;width:40px;height:40px; display:none;" onclick="contact_online_service();" >
            </div>
   


</div>


  <div id="firstline_login_box" name="firstline_login_box" class="firstline_login_box">
	<span id="pwderr" style=" position:absolute; top;7px;left:5px;display:none; color:red;font-size:16px; font-style:italic; font-weight:lighter;font-family:'Bauhaus ITC','Microsoft YaHei';">用户名与密码不匹配，请重新输入</span>
	<table id="first_login_table" style="display:block;top:20px;position:relative;font-family:'Bauhaus ITC','Microsoft YaHei';font-size:16px;font-family:'Bauhaus ITC','Microsoft YaHei'; ">
		<tr style="height:20px;"> 
			<td width="120px"> <span style="font-size:16px;font-family:'Bauhaus ITC','Microsoft YaHei';"> &nbsp;登录 </span></td>
			<td width="10px">&nbsp;</td>
			<td align="right"  style="font-family:'Bauhaus ITC', 'Microsoft YaHei'">&nbsp; </td>
		</tr>
        <tr style="height:1px;"> 
			<td colspan="3"> <hr /> </td>
		</tr>
		<tr> 
			<td colspan="3" > 
				<input id="username" name="username" type="text" size="30" value="邮箱/帐号" class="user_login"  style="font-family:'Bauhaus ITC', 'Microsoft YaHei'"  onclick="resetproperty(this,'邮箱/帐号');"  onkeydown="resetproperty(this,'邮箱/帐号');" ondeactivate="resetproperty1(this,'邮箱/帐号');"/>
			</td>	
		</tr>
		<tr> 
			<td colspan="3" > 
				<input id="userpwd" name="userpwd" type="password" size="30" value="邮箱/帐号" class="user_login" onclick="resetproperty(this,'邮箱/帐号');"
				 onkeydown="resetproperty(this,'邮箱/帐号');" ondeactivate="resetproperty1(this,'邮箱/帐号');"/>
			</td>	
		</tr>
		
		<tr> 
			<td style="height:30px;font-family:'Bauhaus ITC','Microsoft YaHei';"> 
				<img src="./images/option_select_none.png" id="rememberme" name="rememberme" value="0" onclick="switchoption(this);" style="vertical-align:middle;" width="20px" height="20px"/>
				<span style="cursor:pointer;font-family:'Bauhaus ITC', 'Microsoft YaHei';" onclick="switchoption(rememberme);"> 记住我 </span></td>
			<td >&nbsp;</td>
			<td align="right"> <span style="cursor:pointer;font-family:'Bauhaus ITC', 'Microsoft YaHei';" onclick="forgetpwd();"> 忘记密码? </span></td>
		</tr>
		<tr> 
			<td colspan="3" ALIGN="center" style="height:30px;"> 
				<input type="button" onclick="firstlineuserlogin();" value="登  录" style="background-repeat:no-repeat;background-size:100% 100%;font-family:'Bauhaus ITC','Microsoft YaHei'; height:40px;width:120px;cursor:pointer;border:none;border-radius:20px; text-align:center; vertical-align:middle;padding-top:3px; text-align:center;font-size:16px; "  onmouseover="set_bk_blue1(this, 1);"  onmouseout="set_bk_blue1(this,0);"/>
			</td>	
		</tr>

</table>
<span style="font-family:'Bauhaus ITC','Microsoft YaHei';font-weight:bold;cursor:pointer; display:none;" id="logined_user_id" name="logined_user_id" onclick="show_myself(this);"> userid </span>
</div>  