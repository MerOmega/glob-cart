
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
 if(!isset($_SESSION["list"])){
     $obj=Emulator::getInstance();
     $_SESSION["list"]=$obj;
     
 }
 if(!isset($_COOKIE["cart"])){
    $_COOKIE["cart"]=CartClass::getInstance();
 }


?>