<?php

class recipt extends Controller{

    public function __construct(){
            $this->reciptModel=$this->dinamicModel("ReciptClass");
    }

    public function index(){
        $cart=$_SESSION["cart"]->getConjArticle();
        $this->reciptModel->createTicket($cart);
        $this->view("buy",[ReciptClass::getBuyOrder(),$this->reciptModel->getDate(),$this->reciptModel->getFinalprice()]);
        // header("Location:".INDEXED_RUTE);
        // die();
    }


}