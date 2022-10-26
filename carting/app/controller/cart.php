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
            $_SESSION["cart"]->setConjArticle($params,$postAmount,$_SESSION["list"]);
        }
        header("Location:".INDEXED_RUTE);
    }

    public function removeCart(){
        unset($_SESSION["cart"]);
        header("Location:".INDEXED_RUTE);
    }
}