<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include('bitrix.opts.php');
    include('functions.php');
    require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/contacts.php");
	
	 //composer 
    //require_once 'vendor/autoload.php';

    
    $el = new CIBlockElement;
    $bs = new CIBlockSection;

    $tests = $_REQUEST['test'];

    $phone = '79381204388';
    $type = Contacts::getTypeOperator($phone);
    echo $type;
    echo '<br>';
    echo Contacts::getNameOperator($type);
    /*echo (Contacts::isActiveOperator($phone))?'isActiveOperator':'';
    echo (Contacts::isAltelOperator($phone))?'isAltelOperator':'';
    echo (Contacts::isBeelineOperator($phone))?'isBeelineOperator':'';
    echo (Contacts::isTele2Operator($phone))?'isTele2Operator':'';*/

  
  ?>

