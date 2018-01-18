<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include('bitrix.opts.php');
    require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/contacts.php");

	
	 //composer 
    require_once 'vendor/autoload.php';




    $server_prot="http";
    $server_addr="185.87.193.189";
    $server_port="9090";
    $server_url=$server_prot."://".$server_addr.":".$server_port;

    $client = new \GuzzleHttp\Client(['verify' => false ]);

    
    $el = new CIBlockElement;
    $bs = new CIBlockSection;

    $tests = $_REQUEST['test'];


    switch ($tests) {

  
      case 'beeline':
    
      
      break;
      
     
    }

  $action = $_REQUEST['action'];


    switch ($action) {

      case 'generate':
    
      
      break;
    
      case 'beeline':
    
      
      break;
      
      default:

        _parse($server_url, '$server_url');
        $phone = '87077321232';

        $request = sprintf("$server_url/calls?number=‎%s&audio=http://vsemsignal.ru/audio/hold.mp3",$phone);
        _parse($request,'request');
        $res = $client->request('GET', $request);
  
        _parse ($res->getStatusCode(), 'code');
        // 200
        _parse ($res->getHeaderLine('content-type'), 'content-type');
               
        
        $obj = json_decode($res->getBody());
        _parse($obj,'response');
      

        //$call = file_get_contents("http://185.87.193.189:9090/calls?number=‎87077321232&audio=http://vsemsignal.ru/audio/hold.mp3");


        

        if (empty($obj->succsess)) { 
          _parse('error');
        }

      break;
    }


        
  
  ?>

