<?php /* Smarty version Smarty-3.0.6, created on 2016-01-23 13:13:27
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2617356a37c77d549f3-07541349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1453554804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2617356a37c77d549f3-07541349',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
<title>Insert title here</title>  
</head>  
<body>
<?php $_template = new Smarty_Internal_Template("head.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>  
    <?php echo $_smarty_tpl->getVariable('world')->value;?>
   
	<?php echo $_smarty_tpl->getConfigVariable('title');?>

	
	<hr>
	
	  <ul>
	  <?php  $_smarty_tpl->tpl_vars['itm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itm']->key => $_smarty_tpl->tpl_vars['itm']->value){
?>
		<li>name:<?php echo $_smarty_tpl->tpl_vars['itm']->value;?>
</li>
		<?php }} ?>
	  </ul>
	
<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>  
</body>  
</html> 