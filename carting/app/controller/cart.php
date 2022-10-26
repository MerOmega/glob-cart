<?php

class cart extends Controller{

    public function __construct()
    {

    }


    public function index()
    {
        $this->view("cart");
    }

    public function addItem($params){
        $postAmount=$_POST["amount"]??null;
        if(isset($postAmount)){
            $_COOKIE["cart"]->setConjArticle($params,$postAmount);
        }
        var_dump($_COOKIE["cart"]);
        $this->view("cart", $_COOKIE["cart"]->getConjArticle());
    }
}