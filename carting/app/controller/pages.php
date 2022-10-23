<?php

class pages{


    public function __construct(){
    }

    public function index($param){
        echo("aa y $param");

    }

    public function art($params){
        var_dump($params);
    }

}