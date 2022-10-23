<?php

 class Core{

    //Si no hay controlador especificado, uso el default
    protected string|object $defaultController="pages";
    protected string $defaultMethod="index";
    protected array $params=[];



    public function __construct(){
        $url=$this->getUrl()??[];
        //busca si el controlador existe, sino se queda con pages que es el default inicial
        if(isset($url[0]) && file_exists("../app/controller/".$url[0].".php")){
            $this->defaultController=$url[0];
            unset($url[0]);
        }
        //cargo el controlador que necesite
        require_once "../app/controller/".$this->defaultController.".php";
        $this->defaultController=new $this->defaultController;

        //Obtengo metodo de url
        if(isset($url[1]) ){
            if (method_exists($this->defaultController,$url[1])){
                $this->defaultMethod=$url[1];
                unset($url[1]);
            }
        }
        //Method
        $this->params=$url?array_values($url):[];
        //callback con param
        call_user_func_array([$this->defaultController,$this->defaultMethod],$this->params);

    }


     public function getUrl():?array{
        $url=null;
        if(isset($_GET["url"])){
            $url=rtrim($_GET["url"],"/");
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode("/",$url);
            
        }
        return $url;
    }

 }