<?


   #### Начало функций API ####

   //** function _parse */
    //** print preformated array*/
    //** @var $array array */

    if (!function_exists('_parse')) {

         /**
          * @param $array
          */

        function _parse ($array, $dataInfo = 'Any', $json = false, $export = false) { 

            if (!empty($array)) {
                
                if ($json) { $array = json_encode($array); }
                //if (count($array) == 1) { $array = json_encode($array); }

                print_r($dataInfo . '<hr><pre>'); print_r($array); print_r('</pre>'); 

                if ($export) { 
                        print_r('<pre>'); var_export($array); print_r('</pre>');                         
                }
            }

        }


      }

        function xml_attribute($object, $attribute) {

            if(isset($object[$attribute]))
                return (string) $object[$attribute];
        }


        function record_sort($records, $field, $reverse=false) {
                
                $hash = array();
                    
                foreach($records as $key => $record) {
                    
                    $hash[$record[$field].$key] = $record;
                }
                    
                ($reverse)? krsort($hash) : ksort($hash);
                    
                $records = array();
                    
                foreach($hash as $record) {
                        
                        $records []= $record;
                }
                
            return $records;
        }
                    

        function getPropEnumList ($enumCode,$IBLOCK_ID = IBLOCK_ID ) {

            $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"),
             Array("IBLOCK_ID"=>$IBLOCK_ID, "CODE"=>$enumCode));
            while($enum_fields = $property_enums->GetNext())
            {
              $arRes[$enum_fields["ID"]] = $enum_fields["VALUE"];
            }

            return $arRes;

        }



        function base64_to_jpeg($base64_string, $output_file) {

                $ifp = fopen( $output_file, 'wb' );
                $data = explode( ',', $base64_string );
                fwrite( $ifp, base64_decode( $data[ 1 ] ) );
                fclose( $ifp );
            
            return $output_file;
        }

    
      
   


?>

