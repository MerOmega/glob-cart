<?php

class recipt extends Controller{

    public function __construct(){
            $this->reciptModel=$this->dinamicModel("ReciptClass");
    }

    public function index(){
        $cart=$_SESSION["cart"]->getConjArticle();
        $_SESSION["conversation"]->saveAction("User finished buying");
        $this->reciptModel->createTicket($cart);
        header("HTTP/1.1 200 OK");
        header("Location:".INITIAL_RUTE."/recipt/payment");
        die();
    }

    public function payment(){
        $this->view("buy",[$this->reciptModel->getLastOrder()]);
    }


}