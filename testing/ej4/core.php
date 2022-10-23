<?php 
    // Contar la repetición de todas las letras en el siguiente string.
    $data = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ei
    usmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
    officia deserunt mollit anim id est laborum.';

    $include = array('k','a','z','c','e',);
    
    function splitedData(String $data):array{
        $data=strtolower($data);
        $todelete=["."," ",",","\r\n"];
        $splited=str_split(str_replace($todelete,"",$data)); //o preg_replace?
        return $splited;
    }

    function countData(String $data):array{     
        $splited=splitedData($data); 
        $asociative =[];
        foreach($splited as $value){
            if(!array_key_exists($value,$asociative)){
                $asociative[$value]=1;
            }else{
                $asociative[$value]++;
            }
        }
        return $asociative;
    }

    function included(String $data,array $include):array{
        $splited= splitedData($data);
        $includedInArray=array_fill_keys($include,0);
        foreach($splited as $value){
            if(in_array($value,$include)){
                $includedInArray[$value]++;
            }
        }
        return $includedInArray;
    }
    // Funcion que devuelve un array con los caracteres exceptuados
    function notIncluded(String $data,array $include):array{
        $splited= splitedData($data);
        $keyArray= array_diff(range("a","z"),$include);
        $finalArray=array_fill_keys($keyArray,0);
        foreach($splited as $value){
            if(in_array($value,$keyArray)){
                $finalArray[$value]++;
            }
        }
        return $finalArray;
    }

    function iterate($value,$key){
        echo("<tr><td>$key</td><td>$value</td></tr>");
    }

    $total=countData($data);
    $return=included($data,$include);
    $return_except=notIncluded($data,$include);

?>