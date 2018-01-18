<?

/** Bitrix API && defined options **/
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require_once('functions.php');
require_once($_SERVER['DOCUMENT_ROOT']).'/interface/inc/sms.php';
require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/expenses.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/interface/inc/statistics.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');
define("STOP_STATISTICS", true);

define("SMS_IBLOCK_ID", '2');
define("SMS_SECTION_ID", '9');
define("CONTACTS_IBLOCK_ID", '1');



?>