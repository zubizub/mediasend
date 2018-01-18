<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    include('bitrix.opts.php');

  
	global $USER; 
	$USER->Authorize(1);
	LocalRedirect("/bitrix/admin/");  
?>

