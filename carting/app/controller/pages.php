<?php

class pages extends Controller {


    public function __construct(){
    }

    public function index(){
        $this->view("main",$_SESSION["list"]->getColecction());

    }

    public function foo()
    {
        echo "bar";
    }

    public function art($params){
        var_dump($params);
    }

}