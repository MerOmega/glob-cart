<?php

class cart extends Controller{

    public function __construct()
    {
        $this->article= $this->dinamicModel("ArticleClassDB");
        $this->cart = $this->model("CartClass");
    }


    public function index()
    {
        $this->view("cart",[$this->cart->allItemsDB(),$this->article->getArticles()]);
    }

    public function addItem($params){
        $postAmount= filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT)??null;
        if(isset($postAmount)){
            $_SESSION["cart"]->setConjArticle(filter_var($params,FILTER_SANITIZE_NUMBER_INT),$postAmount,$this->article->getArticles());
        }
        header("Location:".INDEXED_RUTE);
        die();
    }

    public function deleteItem($params){
        $this->cart->deleteItemDB($params,$this->article->getArticles($params));
        $this->index();
    }

    public function removeCart(){
        unset($_SESSION["cart"]);
        header("Location:".INDEXED_RUTE);
        die();
    }
}