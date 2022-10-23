
<?php
require_once("config/configuration.php");
// require_once("libs/Base.php");
// require_once("libs/Controller.php");
// require_once("libs/Core.php");

//https://www.php.net/manual/es/function.spl-autoload-register.php
 spl_autoload_register(function ($classname){
     require_once("libs/".$classname.".php");
 });
?>