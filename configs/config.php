<?php
//³ÌÐòÄ¿Â¼  
const DIR_SEP = DIRECTORY_SEPARATOR;  
define('SITE_ROOT', dirname(__FILE__).DIR_SEP);  
$smarty = new Smarty;  
$smarty->template_dir = SITE_ROOT.'templates'.DIR_SEP;  
$smarty->complie_dir  = SITE_ROOT.'templates_c'.DIR_SEP;  
$smarty->config_dir   = SITE_ROOT.'configs'.DIR_SEP;  
$smarty->cache_dir    = SITE_ROOT.'cache'.DIR_SEP;

?>