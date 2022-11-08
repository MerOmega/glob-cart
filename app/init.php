
<?php
require_once("config/configuration.php");
//https://www.php.net/manual/es/function.spl-autoload-register.php

 spl_autoload_register(function ($classname){
    if(file_exists(RUTA_APP."/libs/".$classname.".php")){
        require_once("libs/".$classname.".php");
    }elseif(file_exists(RUTA_APP."/model/".$classname.".php")){
        require_once("model/".$classname.".php");
    }    
 });
 
 if(!session_id()) {
     session_start();
 }

 if(!isset($_SESSION["cart"])){
   $_SESSION["cart"]=CartClass::getInstance();
 }
 if(!isset($_SESSION["conversation"])){
    $_SESSION["conversation"]=ConversationClass::getInstance();
 }
?>