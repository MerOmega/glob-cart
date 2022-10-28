<?php

class cart extends Controller{

    public function __construct()
    {
        $this->cart = $this->model("CartClass"); 
    }


    public function index()
    {
        $this->view("cart",[$this->cart->allItemsDB(),$_SESSION["list"]->getColecction()]);
    }

    public function addItem($params){
        $postAmount=$_POST["amount"]??null;
        if(isset($postAmount)){
            $_SESSION["cart"]->setConjArticle($params,$postAmount);
        }

        // $this->view("main",$_SESSION["list"]->getColecction());
        header("Location:".INDEXED_RUTE);
        die();
    }

    public function deleteItem($params){
        $this->cart->deleteItemDB($params);
        $this->index();
    }

    public function removeCart(){
        unset($_SESSION["cart"]);
        header("Location:".INDEXED_RUTE);
        die();
    }
}