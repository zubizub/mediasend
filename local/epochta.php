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

      case 'beeline_highload':
      
      $test_beeline_file = 'testBeeline.txt';

      $arSelect = Array(
          "ID",
          "IBLOCK_ID",
          "NAME",
          "PREVIEW_TEXT",
          //"DETAIL_TEXT",
          //"DATE_ACTIVE_FROM",
          "PROPERTY_GROUP_CONTACT",
          "PROPERTY_INTEGRATION",
      );
      
      $arFilter = Array(
          "IBLOCK_ID"=>SMS_IBLOCK_ID,
          "SECTION_ID"=>SMS_SECTION_ID,
          "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
          //'PROPERTY_STATUS_VALUE' => 1,
          //'PROPERTY_59_NAME' => 1,
      );
      
      $arSort = Array("ID"=>"ASC");

      $res = CIBlockElement::GetList($arSort, $arFilter, false, Array('nTopCount' => 1), $arSelect);
      //file_put_contents($test_beeline_file, time());

      $file_headers = "\nID;PHONE;TIME;TYPE;\n";
      //file_put_contents($test_beeline_file, $file_headers, FILE_APPEND | LOCK_EX);



      $arrSms = [];
      
      //while($ob = $res->GetNextElement()){
      while($ob = $res->GetNextElement()){
           $arrSms[] = $ob->GetFields();
      }


       $arSelect = Array(
          "ID",
          "IBLOCK_ID",
          //"NAME",
          //"PREVIEW_TEXT",
          "PROPERTY_PHONE",
          "PROPERTY_STATUS",
      );

      $arSort = Array("ID"=>"ASC");

      $beelineCount = 0;
      $type = 0;

      foreach ($arrSms as $key => $arItem) {

        $arFilter = Array(
            "IBLOCK_ID"=>CONTACTS_IBLOCK_ID,
            "SECTION_ID"=>$arItem['PROPERTY_GROUP_CONTACT_VALUE'],
          
        );

        $res = CIBlockElement::GetList($arSort, $arFilter, false, Array('nTopCount' => 50000), $arSelect);

        while($ob = $res->GetNextElement()){
          
          $elementData = $ob->GetFields();
          $arrContact[] = $elementData;
          $type = Contacts::getTypeOperator($elementData['PROPERTY_PHONE_VALUE']);

          if ($type == 3){

              $beelineCount++;
          }

            
          $data = $elementData['ID']. ';' .$elementData['PROPERTY_PHONE_VALUE']. ';' .time(). ';'.$type.";\n";
          file_put_contents($test_beeline_file, $data, FILE_APPEND | LOCK_EX);

          $type = 0;
        }




      }

      // $arrContact["PROPERTY_PHONE_VALUE"] = 7777777
      // проверить билиайн это или нет 

      _parse($beelineCount, 'Beeline Contacts elements');
      
      _parse($arrSms,'1 sms element');
      _parse($arrContact,"Contacts elements");


      
      break;
    
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

      //_parse('ok');

      break;
    }


        
  
  ?>

