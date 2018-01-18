<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include('bitrix.opts.php');
    require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/contacts.php");

	
	 //composer 
    //require_once 'vendor/autoload.php';

    
    $el = new CIBlockElement;
    $bs = new CIBlockSection;

    $tests = $_REQUEST['test'];


    switch ($tests) {

      
      case 'send':


        $src = '<?xml version="1.0" encoding="UTF-8"?>
        <SMS>
            <operations>
            <operation>SEND</operation>
            </operations>
            <authentification>
            <username>ali.akpanov@yandex.ru</username>
            <password>Asd123102030</password>
            </authentification>
            <message>
            <sender>MediaSend</sender>
            <text>Epochta test</text>
            </message>
            <numbers>
            <number messageID="msg103">79381204388</number>
            
            </numbers>
        </SMS>';
     
        //echo $src;

        $Curl = curl_init();
        $CurlOptions = array(
            CURLOPT_URL=>'http://api.atompark.com/members/sms/xml.php',
            CURLOPT_FOLLOWLOCATION=>false,
            CURLOPT_POST=>true,
            CURLOPT_HEADER=>false,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_CONNECTTIMEOUT=>15,
            CURLOPT_TIMEOUT=>100,
            CURLOPT_POSTFIELDS=>array('XML'=>$src),
        );
        curl_setopt_array($Curl, $CurlOptions);
        if(false === ($Result = curl_exec($Curl))) {
            throw new Exception('Http request failed');
        }
     
        curl_close($Curl);
     
        echo $Result;

    
      
      break;
      
     
    }

  $action = $_REQUEST['action'];


    switch ($action) {

      case 'generate':
    
      
      break;
    
      case 'beeline':
    
      
      break;
      
      default:

      //_parse('ok');

      break;
    }


        
  
  ?>

