<?php

class recipt extends Controller{

    public function __construct(){
            $this->reciptModel=$this->dinamicModel("ReciptClass");
    }

    public function index(){
        $cart=$_SESSION["cart"]->getConjArticle();
        $this->reciptModel->createTicket($cart);
        header("Location:".INDEXED_RUTE);
        die();
    }


}