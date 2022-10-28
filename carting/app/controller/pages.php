<?php

class pages extends Controller {


    public function __construct(){
    }

    public function index(){
        $this->view("main",$_SESSION["list"]->getColecction());

    }
    

}