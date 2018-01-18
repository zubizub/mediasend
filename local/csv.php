<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    set_time_limit(3600000);

    include('bitrix.opts.php');
    require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/contacts.php");

	
	 //composer 
    require_once 'vendor/autoload.php';

    use League\Csv\Reader;
    use League\Csv\Statement;

    $el = new CIBlockElement;
    $bs = new CIBlockSection;

    $csv = Reader::createFromPath('import.csv', 'r');
    $csv->setDelimiter(';');
    $csv->setHeaderOffset(0); //set the CSV header offset

    //get 25 records starting from the 11th row
    $stmt = (new Statement())
        ->offset(0)
        ->limit(20000)
    ;

    $phones = [];
    $records = $stmt->process($csv);
    foreach ($records as $record) {
     

      $PROP = array();
      $PROP["PHONE"] = $record['Phone']; 

      $arLoadProductArray = Array(
        "MODIFIED_BY"       => 313, 
        "IBLOCK_SECTION_ID" => 511,          
        "IBLOCK_ID"         => CONTACTS_IBLOCK_ID,
        "PROPERTY_VALUES"   => $PROP,
        "NAME"              => "Элемент",
        "ACTIVE"            => "Y",            
        
        );
      $data = array('');

      if (Contacts::add(1, 508, $record['Phone'], $data)) {

        echo '.';
      }

      /*if($PHONE_ID = $el->Add($arLoadProductArray)){
        echo "New ID: ".$PHONE_ID . " # ". $record['Phone'];
      }
      else{
        echo "Error: ".$el->LAST_ERROR;
      }   */
   
    }

       


    $tests = $_REQUEST['test'];


    switch ($tests) {

    
      case 'csv':


      break;

       default:

      _parse('ok');

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

