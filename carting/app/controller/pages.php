<?php

class pages extends Controller {


    public function __construct(){
    }

    public function index(){
        $this->view("main");

    }

    public function foo()
    {
        echo "bar";
    }

    public function art($params){
        var_dump($params);
    }

}